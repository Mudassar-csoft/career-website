<div class="career-chat" id="career-chat" data-endpoint="{{ route('chatbot.message', [], false) }}" hidden>
    <section class="career-chat__panel" id="career-chat-panel" role="dialog" aria-labelledby="career-chat-title" hidden>
        <header class="career-chat__header">
            <span class="career-chat__avatar" aria-hidden="true"><i class="fas fa-comment-dots"></i></span>
            <div>
                <h2 id="career-chat-title">Career Assistant</h2>
                <p>Let’s find your next step</p>
            </div>
            <button class="career-chat__icon" type="button" data-chat-clear aria-label="Start a new conversation" title="New conversation"><i class="fas fa-redo" aria-hidden="true"></i></button>
            <button class="career-chat__icon" type="button" data-chat-close aria-label="Close chat"><i class="fas fa-times" aria-hidden="true"></i></button>
        </header>
        <div class="career-chat__messages" data-chat-messages role="log" aria-live="polite" aria-relevant="additions" aria-label="Conversation" tabindex="0">
            <div class="career-chat__message career-chat__message--assistant">
                <span class="career-chat__sender">Career Assistant</span>
                <p>Hi! Looking for your next opportunity? I can help you explore programs, find a campus, and get started with admission.</p>
                <p>Choose an option below, or ask me something like “Python course fees” or “Campuses in Lahore”.</p>
            </div>
        </div>
        <p class="career-chat__status" data-chat-status role="status" hidden>Looking that up…</p>
        <nav class="career-chat__topics" aria-label="Chat topics">
            <button type="button" data-chat-topic="programs"><i class="fas fa-graduation-cap" aria-hidden="true"></i> Programs</button>
            <button type="button" data-chat-topic="campuses"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Campuses</button>
            <button type="button" data-chat-topic="admissions"><i class="fas fa-arrow-right" aria-hidden="true"></i> Admission</button>
        </nav>
        <form class="career-chat__form" data-chat-form>
            <label class="career-chat__sr-only" for="career-chat-input">Your message</label>
            <input id="career-chat-input" name="message" type="text" placeholder="Ask about a course or campus…" maxlength="1000" autocomplete="off" required>
            <button type="submit" aria-label="Send message"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
        </form>
        <div class="career-chat__footer">
            @if (config('chatbot.ai_enabled') && filled(config('chatbot.api_key')))
                <span>AI replies may be inaccurate. Messages are sent to OpenAI.</span>
            @else
                <span>Program &amp; campus information from Career Institute.</span>
            @endif
            <a href="https://wa.me/923144444010" target="_blank" rel="noopener noreferrer">Talk to our team <i class="fas fa-external-link-alt" aria-hidden="true"></i></a>
        </div>
    </section>
    <button class="career-chat__launcher" type="button" aria-controls="career-chat-panel" aria-expanded="false" aria-label="Open Career Assistant chat" data-chat-toggle>
        <i class="fas fa-comment-dots" aria-hidden="true"></i><span>Ask Career</span>
    </button>
</div>
