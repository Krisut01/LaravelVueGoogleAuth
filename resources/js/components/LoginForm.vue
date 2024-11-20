<template>
    <div class="login-container">
        <h1>Welcome Back!</h1>
        <p>Please log in to continue</p>
        <form @submit.prevent="handleLogin">
            <input 
                type="email" 
                v-model="email" 
                placeholder="Email" 
                required 
            />
            <input 
                type="password" 
                v-model="password" 
                placeholder="Password" 
                required 
            />
            <button type="submit" class="login-btn">Log In</button>
            <div class="divider">OR</div>
            <button 
                type="button" 
                class="google-btn" 
                @click="loginWithGoogle"
            >
                Continue with Google
            </button>
        </form>
        <div class="links">
            <a href="/register">Register</a> | <a href="/forgot-password">Forgot Password?</a>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: '',
        };
    },
    methods: {
        async handleLogin() {
            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        email: this.email,
                        password: this.password,
                    }),
                });
                const data = await response.json();
                if (response.ok) {
                    alert('Login successful! Redirecting to dashboard...');
                    window.location.href = '/dashboard';
                } else {
                    alert(data.message || 'Login failed. Please try again.');
                }
            } catch (error) {
                console.error('Login error:', error);
                alert('An error occurred. Please try again later.');
            }
        },
        loginWithGoogle() {
            // Redirect the user to the Google authentication endpoint
            window.location.href = '/auth/google';
        },
    },
};
</script>
<style>
/* Centering the container */
body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f4f6f8;
    font-family: Arial, sans-serif;
}

/* Styling the login container */
.login-container {
    max-width: 400px;
    width: 100%;
    padding: 20px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 12px;
    background-color: #ffffff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Header styling */
h1 {
    margin-bottom: 10px;
    color: #333333;
    font-size: 1.8rem;
}

p {
    color: #666666;
    margin-bottom: 20px;
    font-size: 1rem;
}

/* Input fields styling */
input {
    display: block;
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    box-sizing: border-box;
}

/* Button styles */
button {
    display: block;
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

button.login-btn {
    background-color: #007bff;
    color: #ffffff;
    margin-bottom: 10px;
}

button.google-btn {
    background-color: #4285F4;
    color: #ffffff;
}

button:hover {
    opacity: 0.9;
}

/* Divider style */
.divider {
    margin: 15px 0;
    font-size: 14px;
    color: #666666;
    text-transform: uppercase;
}

/* Links styling */
.links {
    margin-top: 10px;
}

.links a {
    color: #007bff;
    text-decoration: none;
    font-size: 0.9rem;
}

.links a:hover {
    text-decoration: underline;
}
</style>
