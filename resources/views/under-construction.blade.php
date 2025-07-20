@extends('layout.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100 relative overflow-hidden">
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-32 h-32 bg-primary-300 rounded-full blur-3xl"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-blue-300 rounded-full blur-2xl"></div>
        <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-purple-300 rounded-full blur-3xl"></div>
        <div class="absolute bottom-40 right-10 w-20 h-20 bg-yellow-300 rounded-full blur-xl"></div>
    </div>

    <div class="text-center max-w-2xl mx-auto px-6 relative z-10">
        
        <!-- Construction Icon with Animation -->
        <div class="mb-8 relative">
            <div class="w-32 h-32 mx-auto bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center shadow-2xl">
                <i class="fa-solid fa-hard-hat text-white text-6xl animate-bounce"></i>
            </div>
            <!-- Floating Tools -->
            <div class="absolute -top-4 -right-4 w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center shadow-lg animate-spin-slow">
                <i class="fa-solid fa-wrench text-white text-xl"></i>
            </div>
            <div class="absolute -bottom-2 -left-6 w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg animate-pulse">
                <i class="fa-solid fa-hammer text-white text-lg"></i>
            </div>
        </div>

        <!-- Main Heading -->
        <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-4">
            <span class="bg-gradient-to-r from-primary-600 to-blue-600 bg-clip-text text-transparent">
                Under Construction
            </span>
        </h1>

        <!-- Subtitle -->
        <h2 class="text-xl md:text-2xl text-gray-600 mb-6 font-medium">
            We're Building Something Amazing!
        </h2>

        <!-- Description -->
        <p class="text-gray-500 text-lg mb-8 leading-relaxed">
            This feature is currently under development. Our team is working hard to bring you 
            an incredible experience. Please check back soon!
        </p>

        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex justify-between text-sm text-gray-600 mb-2">
                <span>Progress</span>
                <span>75%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                <div class="h-full bg-gradient-to-r from-primary-500 to-blue-500 rounded-full progress-bar" style="width: 75%"></div>
            </div>
        </div>

        <!-- Feature List -->
        <div class="grid md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-white/20">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                    <i class="fa-solid fa-rocket text-green-600 text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">Fast & Efficient</h3>
                <p class="text-gray-600 text-sm">Lightning-fast performance with optimized workflows</p>
            </div>
            
            <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-white/20">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                    <i class="fa-solid fa-shield-halved text-blue-600 text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">Secure & Reliable</h3>
                <p class="text-gray-600 text-sm">Enterprise-grade security with 99.9% uptime</p>
            </div>
            
            <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-white/20">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                    <i class="fa-solid fa-users text-purple-600 text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">User-Friendly</h3>
                <p class="text-gray-600 text-sm">Intuitive interface designed for everyone</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('dashboard') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary-600 to-blue-600 text-white font-medium rounded-lg hover:from-primary-700 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                <i class="fa-solid fa-arrow-left mr-2"></i>
                Back to Dashboard
            </a>
            
            <button onclick="window.location.reload()" 
                    class="inline-flex items-center px-6 py-3 bg-white text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-300 shadow-lg border border-gray-200 hover:shadow-xl">
                <i class="fa-solid fa-refresh mr-2"></i>
                Check Again
            </button>
        </div>

        <!-- Social Links -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <p class="text-gray-500 mb-4">Stay updated with our progress:</p>
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-blue-500 transition-colors">
                    <i class="fab fa-twitter text-2xl"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">
                    <i class="fab fa-facebook text-2xl"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-pink-500 transition-colors">
                    <i class="fab fa-instagram text-2xl"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-blue-700 transition-colors">
                    <i class="fab fa-linkedin text-2xl"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for animations -->
<style>
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .animate-spin-slow {
        animation: spin-slow 3s linear infinite;
    }
    
    .progress-bar {
        animation: progressLoad 2s ease-in-out;
    }
    
    @keyframes progressLoad {
        from { width: 0%; }
        to { width: 75%; }
    }
    
    /* Floating animation for background elements */
    .absolute.top-10 { animation: float1 6s ease-in-out infinite; }
    .absolute.top-40 { animation: float2 8s ease-in-out infinite; }
    .absolute.bottom-20 { animation: float3 7s ease-in-out infinite; }
    .absolute.bottom-40 { animation: float4 5s ease-in-out infinite; }
    
    @keyframes float1 {
        0%, 100% { transform: translateY(0px) translateX(0px); }
        50% { transform: translateY(-20px) translateX(10px); }
    }
    
    @keyframes float2 {
        0%, 100% { transform: translateY(0px) translateX(0px); }
        50% { transform: translateY(15px) translateX(-15px); }
    }
    
    @keyframes float3 {
        0%, 100% { transform: translateY(0px) translateX(0px); }
        50% { transform: translateY(-10px) translateX(20px); }
    }
    
    @keyframes float4 {
        0%, 100% { transform: translateY(0px) translateX(0px); }
        50% { transform: translateY(25px) translateX(-10px); }
    }

    /* Glowing effect */
    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.1);
    }
</style>

@endsection
