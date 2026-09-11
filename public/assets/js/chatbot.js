(() => {
    'use strict';
    const root = document.getElementById('career-chat');
    if (!root) return;

    const panel = root.querySelector('#career-chat-panel');
    const toggle = root.querySelector('[data-chat-toggle]');
    const messages = root.querySelector('[data-chat-messages]');
    const form = root.querySelector('[data-chat-form]');
    const input = form.elements.message;
    const status = root.querySelector('[data-chat-status]');
    const greeting = messages.firstElementChild.cloneNode(true);
    let history = [];
    let pending = null;

    function openChat(open) {
        panel.hidden = !open;
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Close Career Assistant chat' : 'Open Career Assistant chat');
        (open ? input : toggle).focus({ preventScroll: true });
    }

    function busy(value) {
        status.hidden = !value;
        root.querySelectorAll('[data-chat-topic], [type="submit"]').forEach(button => { button.disabled = value; });
    }

    function element(tag, text, className) {
        const node = document.createElement(tag);
        if (text != null) node.textContent = text;
        if (className) node.className = className;
        return node;
    }

    function addMessage(text, role = 'assistant', label = 'Career Assistant') {
        const bubble = element('div', null, `career-chat__message career-chat__message--${role}`);
        bubble.append(element('span', role === 'user' ? 'You' : label, 'career-chat__sender'), element('p', text));
        messages.append(bubble);
        while (messages.children.length > 40) messages.firstElementChild.remove();
        return bubble;
    }

    function action(parent, label, callback) {
        const button = element('button', label, 'career-chat__action');
        button.type = 'button';
        button.addEventListener('click', callback);
        parent.append(button);
    }

    function link(parent, label, href) {
        const anchor = element('a', label, 'career-chat__action');
        anchor.href = href;
        anchor.target = '_blank';
        anchor.rel = 'noopener noreferrer';
        parent.append(anchor);
    }

    function openAdmission(program = '') {
        const modal = document.getElementById('admission-modal');
        if (!modal || !window.bootstrap?.Modal) {
            window.location.assign('/contact-us');
            return;
        }
        const course = modal.querySelector('[name="course"]');
        if (course && program) course.value = program;
        openChat(false);
        modal.addEventListener('hidden.bs.modal', () => toggle.focus({ preventScroll: true }), { once: true });
        window.bootstrap.Modal.getOrCreateInstance(modal).show();
    }

    function renderReply(data, request) {
        const bubble = addMessage(data.message, 'assistant', data.mode === 'ai' ? 'Career Assistant · AI reply' : 'Career Assistant');
        for (const program of data.programs || []) {
            const card = element('article', null, 'career-chat__card');
            card.append(element('h3', program.name));
            const details = [];
            if (Number(program.duration_weeks) > 0) details.push(`${program.duration_weeks} weeks`);
            if (program.fee != null && program.fee !== '' && Number.isFinite(Number(program.fee))) details.push(`Listed fee: ${Number(program.fee).toLocaleString('en-PK', { maximumFractionDigits: 2 })}`);
            if (details.length) card.append(element('p', details.join(' · ')));
            if (Number(program.installments) > 0) card.append(element('p', `Installments listed: ${program.installments}`));
            if (program.description) card.append(element('p', program.description));
            if (program.prerequisite && !['na', 'n/a'].includes(program.prerequisite.toLowerCase())) card.append(element('p', `Prerequisite: ${program.prerequisite}`));
            action(card, 'Ask about this program', () => send({ message: `Tell me about ${program.name}` }));
            action(card, 'Admission inquiry', () => openAdmission(program.name));
            bubble.append(card);
        }
        for (const campus of data.campuses || []) {
            const card = element('article', null, 'career-chat__card');
            card.append(element('h3', campus.name));
            if (campus.address || campus.city) card.append(element('p', campus.address || campus.city));
            const phone = campus.mobile || campus.landline;
            if (phone && /^[+\d\s()-]+$/.test(phone)) link(card, `Call ${phone}`, `tel:${phone.replace(/[^+\d]/g, '')}`);
            if (campus.campus_email && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(campus.campus_email)) link(card, 'Email campus', `mailto:${encodeURIComponent(campus.campus_email)}`);
            if (campus.address && !/virtual/i.test(campus.name)) link(card, 'View map', `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(campus.address)}`);
            bubble.append(card);
        }
        if (data.admission) action(bubble, 'Open admission form', () => openAdmission());
        if (data.next_page) action(bubble, 'Show more results', () => send({ ...request, page: data.next_page }, false));
        if (data.notice) bubble.append(element('p', data.notice, 'career-chat__notice'));
        history.push({ role: 'assistant', content: data.message.slice(0, 2000) });
        history = history.slice(-8);
    }

    async function send(request, showMessage = true) {
        if (pending || !request.message.trim()) return;
        const controller = new AbortController();
        pending = controller;
        const priorHistory = history.slice(-8);
        if (showMessage) {
            addMessage(request.message, 'user');
            history.push({ role: 'user', content: request.message });
        }
        input.value = '';
        busy(true);
        messages.scrollTop = messages.scrollHeight;
        const timeout = window.setTimeout(() => controller.abort(), 50000);
        try {
            const response = await fetch(root.dataset.endpoint, {
                method: 'POST',
                credentials: 'same-origin',
                signal: controller.signal,
                headers: { 'Content-Type': 'application/json', Accept: 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '' },
                body: JSON.stringify({ ...request, history: priorHistory }),
            });
            if (!response.ok) {
                const message = response.status === 429 ? 'Please wait a minute before sending another message.'
                    : response.status === 419 ? 'Your session has expired. Refresh this page to continue chatting.'
                    : 'I could not get a reply right now. Please try again.';
                throw new Error(message);
            }
            const data = await response.json();
            if (typeof data.message !== 'string') throw new Error('I could not read that reply. Please try again.');
            if (pending === controller) renderReply(data, request);
        } catch (error) {
            if (pending !== controller) return;
            const message = error.name === 'AbortError' ? 'That took longer than expected. Please try again.'
                : error instanceof TypeError ? 'Unable to connect. Check your connection and try again.' : error.message;
            const bubble = addMessage(message, 'error');
            action(bubble, 'Try again', () => send(request, false));
        } finally {
            window.clearTimeout(timeout);
            if (pending === controller) {
                pending = null;
                busy(false);
                messages.scrollTop = messages.scrollHeight;
            }
        }
    }

    toggle.addEventListener('click', () => openChat(panel.hidden));
    root.querySelector('[data-chat-close]').addEventListener('click', () => openChat(false));
    root.addEventListener('keydown', event => {
        if (event.key === 'Escape' && !panel.hidden) { event.preventDefault(); openChat(false); }
    });
    root.querySelector('[data-chat-clear]').addEventListener('click', () => {
        pending?.abort();
        pending = null;
        history = [];
        busy(false);
        messages.replaceChildren(greeting.cloneNode(true));
        input.value = '';
        input.focus();
    });
    root.querySelectorAll('[data-chat-topic]').forEach(button => {
        button.addEventListener('click', () => send({ message: button.textContent.trim(), topic: button.dataset.chatTopic }));
    });
    form.addEventListener('submit', event => {
        event.preventDefault();
        if (input.value.trim()) send({ message: input.value.trim() });
    });
    // Keep the assistant behind the site's admission and inquiry dialogs.
    document.addEventListener('show.bs.modal', () => { root.hidden = true; });
    document.addEventListener('hidden.bs.modal', () => { root.hidden = false; });
    root.hidden = false;
})();
