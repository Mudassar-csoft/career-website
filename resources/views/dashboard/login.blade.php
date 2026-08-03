<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | Dashboard</title>
    <style>
        :root {
            --login-from: #009DB8;
            --login-to: #03C587;
            --login-text: #1d2b36;
        }
        * { box-sizing: border-box; }
        html, body {
            margin: 0;
            height: 100%;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
        }
        .login-page {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            overflow: hidden;
            background: linear-gradient(135deg, var(--login-from) 0%, var(--login-to) 100%);
        }
        .cells-wrap {
            position: absolute;
            inset: 0;
            z-index: 1;
            overflow: hidden;
        }
        .cell {
            position: absolute;
        }
        .cell svg {
            display: block;
            width: 100%;
            height: 100%;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.12));
        }
        .cell-1  { width: 54px; height: 54px; top: 8%;  left: 8%;  color: rgba(255,255,255,0.85); animation: cell-drift-a 22s ease-in-out infinite; }
        .cell-2  { width: 40px; height: 40px; top: 55%; left: 14%; color: rgba(255,255,255,0.7);  animation: cell-drift-b 26s ease-in-out infinite; }
        .cell-3  { width: 60px; height: 60px; top: 28%; left: 42%; color: rgba(255,255,255,0.6);  animation: cell-drift-c 30s ease-in-out infinite; }
        .cell-4  { width: 38px; height: 38px; top: 12%; left: 66%; color: rgba(255,255,255,0.75); animation: cell-drift-d 20s ease-in-out infinite; }
        .cell-5  { width: 46px; height: 46px; top: 64%; left: 60%; color: rgba(255,255,255,0.7);  animation: cell-drift-a 24s ease-in-out infinite reverse; }
        .cell-6  { width: 42px; height: 42px; top: 40%; left: 82%; color: rgba(255,255,255,0.65); animation: cell-drift-b 18s ease-in-out infinite reverse; }
        .cell-7  { width: 48px; height: 48px; top: 78%; left: 35%; color: rgba(255,255,255,0.65); animation: cell-drift-c 28s ease-in-out infinite reverse; }
        .cell-8  { width: 44px; height: 44px; top: 5%;  left: 44%; color: rgba(255,255,255,0.7);  animation: cell-drift-d 25s ease-in-out infinite reverse; }
        .cell-9  { width: 40px; height: 40px; top: 85%; left: 10%; color: rgba(255,255,255,0.7);  animation: cell-drift-a 27s ease-in-out infinite; animation-delay: -4s; }
        .cell-10 { width: 46px; height: 46px; top: 20%; left: 20%; color: rgba(255,255,255,0.6);  animation: cell-drift-b 21s ease-in-out infinite; animation-delay: -9s; }
        .cell-11 { width: 42px; height: 42px; top: 70%; left: 86%; color: rgba(255,255,255,0.75); animation: cell-drift-c 25s ease-in-out infinite; animation-delay: -12s; }
        .cell-12 { width: 34px; height: 34px; top: 46%; left: 4%;  color: rgba(255,255,255,0.65); animation: cell-drift-d 23s ease-in-out infinite; animation-delay: -6s; }
        .cell-13 { width: 38px; height: 38px; top: 15%; left: 90%; color: rgba(255,255,255,0.7);  animation: cell-drift-a 29s ease-in-out infinite reverse; animation-delay: -15s; }
        .cell-14 { width: 50px; height: 50px; top: 88%; left: 55%; color: rgba(255,255,255,0.6);  animation: cell-drift-b 24s ease-in-out infinite reverse; animation-delay: -3s; }
        .cell-15 { width: 36px; height: 36px; top: 60%; left: 30%; color: rgba(255,255,255,0.65); animation: cell-drift-c 19s ease-in-out infinite reverse; animation-delay: -8s; }
        .cell-16 { width: 44px; height: 44px; top: 33%; left: 72%; color: rgba(255,255,255,0.7);  animation: cell-drift-d 26s ease-in-out infinite reverse; animation-delay: -11s; }
        @keyframes cell-drift-a {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            25%      { transform: translate(35px, -28px) rotate(10deg) scale(1.1); }
            50%      { transform: translate(-18px, 24px) rotate(-8deg) scale(0.92); }
            75%      { transform: translate(24px, 18px) rotate(6deg) scale(1.05); }
        }
        @keyframes cell-drift-b {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            30%      { transform: translate(-30px, -22px) rotate(-12deg) scale(0.9); }
            60%      { transform: translate(22px, 30px) rotate(9deg) scale(1.12); }
        }
        @keyframes cell-drift-c {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            20%      { transform: translate(26px, 26px) rotate(7deg) scale(1.08); }
            50%      { transform: translate(-36px, 8px) rotate(-10deg) scale(0.88); }
            80%      { transform: translate(14px, -30px) rotate(6deg) scale(1.06); }
        }
        @keyframes cell-drift-d {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            35%      { transform: translate(-26px, 30px) rotate(-9deg) scale(1.08); }
            70%      { transform: translate(30px, -14px) rotate(8deg) scale(0.92); }
        }
        .login-card {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 400px;
            background: #fff;
            border-radius: 16px;
            padding: 40px 36px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.25);
        }
        .login-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 22px;
        }
        .login-logo img {
            width: 170px;
            height: auto;
        }
        .login-card h1 {
            margin: 0 0 6px;
            font-size: 22px;
            text-align: center;
            color: var(--login-text);
        }
        .login-card p.login-subtitle {
            margin: 0 0 28px;
            text-align: center;
            font-size: 13px;
            color: #7c8a94;
        }
        .login-field {
            margin-bottom: 18px;
        }
        .login-field label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 600;
            color: var(--login-text);
        }
        .login-field input {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #e2e8ef;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            color: var(--login-text);
            outline: none;
            transition: border-color .15s, box-shadow .15s;
        }
        .login-field input:focus {
            border-color: var(--login-to);
            box-shadow: 0 0 0 3px rgba(3, 197, 135, 0.15);
        }
        .login-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            font-size: 13px;
        }
        .login-remember {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #5b6b78;
        }
        .login-row a {
            color: #03917a;
            text-decoration: none;
            font-weight: 600;
        }
        .login-submit {
            width: 100%;
            padding: 12px;
            border: 0;
            border-radius: 8px;
            background: linear-gradient(90deg, var(--login-from) 0%, var(--login-to) 100%);
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity .15s;
        }
        .login-submit:hover {
            opacity: .92;
        }
        .login-notice {
            display: none;
            margin-top: 14px;
            padding: 10px 12px;
            border-radius: 8px;
            background: #fef3e0;
            color: #b7791f;
            font-size: 12px;
            text-align: center;
        }
        .login-back {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
            color: #7c8a94;
            text-decoration: none;
        }
        .login-back:hover {
            color: #03917a;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="cells-wrap">
            <!-- Graduation cap -->
            <div class="cell cell-1">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 3 1 9l11 6 9-4.91V17h2V9L12 3Z"/><path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82Z"/></svg>
            </div>
            <!-- Code brackets -->
            <div class="cell cell-2">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
            <!-- Book -->
            <div class="cell cell-3">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15Z"/></svg>
            </div>
            <!-- Certificate / award -->
            <div class="cell cell-4">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"/><path d="M8.21 13.89 7 23l5-3 5 3-1.21-9.12"/></svg>
            </div>
            <!-- CPU / IT chip -->
            <div class="cell cell-5">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 1v3M15 1v3M9 20v3M15 20v3M1 9h3M1 15h3M20 9h3M20 15h3"/></svg>
            </div>
            <!-- Globe / study abroad -->
            <div class="cell cell-6">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10Z"/></svg>
            </div>
            <!-- Monitor / computer lab -->
            <div class="cell cell-7">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
            </div>
            <!-- Briefcase / job placement -->
            <div class="cell cell-8">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </div>
            <!-- Lightbulb / ideas -->
            <div class="cell cell-9">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7c.6.5 1 1.2 1 2.3h6c0-1.1.4-1.8 1-2.3A7 7 0 0 0 12 2Z"/></svg>
            </div>
            <!-- Bar chart / growth -->
            <div class="cell cell-10">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><rect x="7" y="12" width="3" height="6"/><rect x="12" y="8" width="3" height="10"/><rect x="17" y="5" width="3" height="13"/></svg>
            </div>
            <!-- Graduation cap (variant) -->
            <div class="cell cell-11">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 3 1 9l11 6 9-4.91V17h2V9L12 3Z"/><path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82Z"/></svg>
            </div>
            <!-- Code brackets (variant) -->
            <div class="cell cell-12">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
            <!-- Book (variant) -->
            <div class="cell cell-13">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15Z"/></svg>
            </div>
            <!-- CPU (variant) -->
            <div class="cell cell-14">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 1v3M15 1v3M9 20v3M15 20v3M1 9h3M1 15h3M20 9h3M20 15h3"/></svg>
            </div>
            <!-- Globe (variant) -->
            <div class="cell cell-15">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10Z"/></svg>
            </div>
            <!-- Briefcase (variant) -->
            <div class="cell cell-16">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </div>
        </div>

        <div class="login-card">
            <div class="login-logo">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="Career Logo">
            </div>
            <h1>Welcome back</h1>
            <p class="login-subtitle">Sign in to access your dashboard</p>

            <form id="login-form">
                <div class="login-field">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" placeholder="you@example.com" autocomplete="username">
                </div>
                <div class="login-field">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" placeholder="••••••••" autocomplete="current-password">
                </div>
                <div class="login-row">
                    <label class="login-remember">
                        <input type="checkbox" id="login-remember">
                        Remember me
                    </label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="login-submit">Sign In</button>
                <p class="login-notice" id="login-notice">Authentication isn't set up yet — this is a UI preview.</p>
            </form>

            <a href="{{ route('dashboard.index') }}" class="login-back">&larr; Back to dashboard preview</a>
        </div>
    </div>

    <script>
        document.getElementById('login-form').addEventListener('submit', function (e) {
            e.preventDefault();
            document.getElementById('login-notice').style.display = 'block';
        });
    </script>
</body>
</html>
