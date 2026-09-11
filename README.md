# Career Website

This project has been converted from a static HTML site into a Laravel application.

## Requirements

- PHP 8.2+
- Composer

## Run locally

```bash
copy .env.example .env
composer install
php artisan key:generate
php artisan serve
```

Open `http://127.0.0.1:8000`.

## Main routes

- `/`
- `/about-us`
- `/ambassador-program`
- `/contact-us`
- `/courses-certifications`
- `/coworking-space`
- `/how-to-pay`
- `/job-placement`
- `/kryterion`
- `/pearson-vue`
- `/psi-exam`
- `/study-abroad`
- `/verifications`

Legacy `.html` URLs are redirected to the Laravel routes.

## Career Assistant chat

The public website includes an **Ask Career** button at the bottom left. Visitors can search IMS programs (including listed fees and duration), find campuses by city, browse more results, and open the existing admission inquiry form with a program prefilled. The widget does not submit admissions itself. Program availability at a specific campus must be confirmed by the admissions team.

Laravel reads `IMS_PROGRAMS_URL` and `IMS_CAMPUSES_URL`, defaulting to `https://ims.career.edu.pk/api/programs` and `https://ims.career.edu.pk/api/campuses`. Active public catalog fields are cached for five minutes. The API does not supply a currency field, so listed fees are displayed without an assumed currency or calculated discounts. No database migration or frontend build is needed for the widget.

Program and campus search works without an AI key. To enable conversational replies grounded in the retrieved IMS records, add these settings to your server's `.env`:

```dotenv
CHATBOT_AI_ENABLED=true
OPENAI_API_KEY=your-server-side-api-key
CHATBOT_AI_MODEL=gpt-4.1-mini-2025-04-14
```

Run `php artisan config:clear` after changing settings (or rebuild the configuration cache during deployment). The optional integration uses the [OpenAI Responses API](https://developers.openai.com/api/docs/guides/text). It sends the latest message, up to eight previous messages, and relevant public catalog fields to OpenAI with `store: false`. OpenAI API usage requires an account with API access and is billed separately. The widget discloses AI use when enabled; no API key is rendered in the browser. Chat history lives in page memory and clears on refresh or **New conversation**. Without AI, replies use keyword search and predefined guidance; semantic questions and multilingual replies require AI. If AI is unavailable, catalog results remain usable.

Set `CHATBOT_ENABLED=false` to disable the widget and endpoint. The endpoint uses the site's CSRF protection and allows 20 requests per minute per IP. On production, configure usage limits in your OpenAI project as appropriate.

Verify the integration with `php artisan test --filter=ChatbotTest`. These tests mock IMS and OpenAI and never submit real admissions or make paid AI requests.
