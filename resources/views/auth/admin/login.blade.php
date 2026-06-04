<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ get_setting('website_name') ?: 'RoofShelter' }} | Admin Login</title>
    
    <link rel="icon" href="{{ asset(get_setting('site_logo') ? 'img/'.get_setting('site_logo') : 'panel-assets/icon.png') }}" type="image/x-icon" />

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #0a1e56 0%, #0f2a6e 100%);
            --accent-color: #f97316;
            --accent-glow: rgba(249, 115, 22, 0.25);
            --panel-bg: rgba(10, 30, 86, 0.95);
            --text-light: #f8fafc;
            --text-muted: #94a3b8;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #0a1e56;
            min-height: 100vh;
            color: var(--text-light);
            overflow-x: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: 100%;
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
        }

        .visual-panel {
            position: relative;
            background-image: linear-gradient(rgba(10, 30, 86, 0.4), rgba(10, 30, 86, 0.8)), url('{{ asset('img/'.get_setting('login_bg_image')) }}');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 3.5rem;
            overflow: hidden;
        }

        .visual-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 30%, rgba(249, 115, 22, 0.15) 0%, transparent 70%);
            z-index: 1;
        }

        .visual-content { position: relative; z-index: 2; margin-top: auto; max-width: 520px; }
        .visual-tagline { font-size: 2.5rem; font-weight: 700; line-height: 1.2; letter-spacing: -0.03em; margin-bottom: 1rem; color: #ffffff; text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); }
        .visual-desc { color: #cbd5e1; font-size: 1.05rem; line-height: 1.6; }

        .featured-image-container {
            position: relative; z-index: 2; margin-bottom: 2rem; border-radius: 16px; overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4); max-height: 300px; display: flex; align-items: center;
            justify-content: center; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .featured-image-container img { width: 100%; height: 100%; object-fit: cover; }

        .form-panel {
            background: var(--panel-bg); display: flex; flex-direction: column; justify-content: center;
            padding: 3rem 4rem; position: relative; border-left: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
        }
        .form-container { width: 100%; max-width: 420px; margin: 0 auto; }
        .logo-box { margin-bottom: 2.5rem; }
        .logo-box img { max-height: 48px; object-fit: contain; }
        .welcome-header { margin-bottom: 2.5rem; }
        .welcome-title { font-size: 1.75rem; font-weight: 700; color: #ffffff; letter-spacing: -0.02em; }
        .welcome-subtitle { color: var(--text-muted); font-size: 0.95rem; margin-top: 0.25rem; }

        .form-group-custom { position: relative; margin-bottom: 1.75rem; }
        .form-input-custom {
            width: 100%; background: rgba(255, 255, 255, 0.03); border: 1.5px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px; padding: 1.1rem 1rem 1.1rem 2.8rem; color: #ffffff; font-weight: 500;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .form-input-custom:focus {
            background: rgba(255, 255, 255, 0.07); border-color: var(--accent-color);
            outline: none; box-shadow: 0 0 0 4px var(--accent-glow);
        }
        .input-icon-custom {
            position: absolute; left: 1rem; top: 50%; transform: translateY(-50%);
            color: var(--text-muted); font-size: 1.2rem; transition: color 0.25s; pointer-events: none;
        }
        .form-input-custom:focus ~ .input-icon-custom { color: var(--accent-color); }
        .eye-toggle-custom {
            position: absolute; right: 1rem; top: 50%; transform: translateY(-50%);
            color: var(--text-muted); cursor: pointer; font-size: 1.1rem; transition: color 0.2s;
        }
        .eye-toggle-custom:hover { color: #ffffff; }
        .custom-alert-box {
            border-radius: 12px; background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5; padding: 0.75rem 1rem; font-size: 0.875rem; margin-bottom: 1.5rem; font-weight: 500;
        }
        .btn-admin-submit {
            background: var(--accent-color); color: #ffffff; border: none; border-radius: 12px;
            padding: 1rem; font-weight: 600; font-size: 1rem; width: 100%; transition: all 0.3s ease;
            margin-top: 1rem; box-shadow: 0 4px 12px var(--accent-glow);
        }
        .btn-admin-submit:hover { background: #ea580c; transform: translateY(-1px); box-shadow: 0 6px 20px var(--accent-glow); }
        .btn-admin-submit:active { transform: translateY(1px); }
        .bottom-decoration { text-align: center; margin-top: 2rem; color: var(--text-muted); font-size: 0.85rem; letter-spacing: 0.05em; }
        @media (max-width: 991px) { .login-wrapper { grid-template-columns: 1fr; } .visual-panel { display: none; } .form-panel { padding: 3rem 2rem; border-left: none; } }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="login-wrapper">
            
            <!-- Left Banner Pane -->
            <div class="visual-panel">
                <div class="featured-image-container">
                    <img src="{{ asset('img/'.get_setting('login_page_image')) }}" alt="Login Cover">
                </div>
                <div class="visual-content">
                    <h1 class="visual-tagline">Manage Your Roofing Services Efficiently</h1>
                    <p class="visual-desc">Welcome to the administration panel of {{ get_setting('website_name') }}. Access clean scheduling, real-time analytics, and quote management in one modern dashboard.</p>
                </div>
            </div>

            <!-- Right Form Pane -->
            <div class="form-panel">
                <div class="form-container">
                    
                    <!-- Branding Logo -->
                    <div class="logo-box">
                        @if(get_setting('system_logo_white'))
                            <img src="{{ asset(get_setting('system_logo_white') ? 'img/'.get_setting('system_logo_white') : 'panel-assets/icon.png') }}" alt="RoofShelter Logo" style="max-height:42px; width:auto;">
                        @else
                            <span class="fs-4 fw-bold text-white">{{ get_setting('website_name') }}</span>
                        @endif
                    </div>

                    <!-- Greeting Header -->
                    <div class="welcome-header">
                        <h2 class="welcome-title">Welcome Admin</h2>
                        <p class="welcome-subtitle">Happy to see you again. Please sign in below.</p>
                    </div>

                    <!-- Alerts for Errors and Successes -->
                    @if(Session::has('success'))
                        <div class="custom-alert-box d-flex align-items-center gap-2" style="background: rgba(16, 185, 129, 0.15); border-color: rgba(16, 185, 129, 0.2); color: #a7f3d0;">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>{{Session::get('success')}}</div>
                        </div>
                    @endif

                    @if(Session::has('error'))
                        <div class="custom-alert-box d-flex align-items-center gap-2">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <div>{{Session::get('error')}}</div>
                        </div>
                    @endif

                    <!-- Sign In Form -->
                    <form method="POST" action="{{route('admin.authenticate')}}" id="login-form">
                        @csrf
                        
                        <!-- Email Input -->
                        <div class="form-group-custom">
                            <input type="email" name="email" value="{{ old('email') }}" 
                                   placeholder="Admin Email"
                                   class="form-input-custom @error('email') is-invalid @enderror" required autocomplete="username">
                            <i class="bi bi-envelope input-icon-custom"></i>
                            @error('email')
                                <div class="invalid-feedback d-block mt-2 ps-1" style="color: #fca5a5;">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="form-group-custom">
                            <input type="password" name="password" id="adminPassword"
                                   placeholder="Password"
                                   class="form-input-custom @error('password') is-invalid @enderror" required autocomplete="current-password">
                            <i class="bi bi-shield-lock input-icon-custom"></i>
                            <span class="eye-toggle-custom" id="toggleAdminPassword">
                                <i class="bi bi-eye-slash" id="adminToggleIcon"></i>
                            </span>
                            @error('password')
                                <div class="invalid-feedback d-block mt-2 ps-1" style="color: #fca5a5;">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn-admin-submit">
                            Sign In to Portal <i class="bi bi-arrow-right-short ms-1"></i>
                        </button>
                    </form>

                    <!-- Footer Note -->
                    <div class="bottom-decoration">
                        <i class="bi bi-sun me-1"></i> HAVE A GOOD DAY
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Toggle Password Script -->
    <script>
        const toggleAdminPassword = document.querySelector('#toggleAdminPassword');
        const adminPassword = document.querySelector('#adminPassword');
        const adminToggleIcon = document.querySelector('#adminToggleIcon');

        if (toggleAdminPassword && adminPassword && adminToggleIcon) {
            toggleAdminPassword.addEventListener('click', function () {
                const type = adminPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                adminPassword.setAttribute('type', type);
                
                adminToggleIcon.classList.toggle('bi-eye');
                adminToggleIcon.classList.toggle('bi-eye-slash');
            });
        }
    </script>
</body>
</html>
