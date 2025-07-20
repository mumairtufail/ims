@extends('layout.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 relative overflow-hidden">
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-20 w-24 h-24 bg-blue-300 rounded-full blur-2xl animate-pulse"></div>
        <div class="absolute top-60 right-30 w-32 h-32 bg-purple-300 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute bottom-40 left-1/3 w-28 h-28 bg-pink-300 rounded-full blur-2xl animate-pulse delay-2000"></div>
        <div class="absolute bottom-20 right-20 w-20 h-20 bg-green-300 rounded-full blur-xl animate-pulse delay-500"></div>
    </div>

    <div class="text-center max-w-2xl mx-auto px-6 relative z-10">
        
        <!-- Work in Progress Icon -->
        <div class="mb-8 relative">
            <div class="w-28 h-28 mx-auto bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-2xl">
                <i class="fa-solid fa-code text-white text-5xl animate-pulse"></i>
            </div>
            <!-- Floating Elements -->
            <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg animate-bounce">
                <i class="fa-solid fa-star text-white text-sm"></i>
            </div>
            <div class="absolute -bottom-1 -left-4 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center shadow-lg animate-bounce delay-500">
                <i class="fa-solid fa-check text-white text-xs"></i>
            </div>
        </div>

        <!-- Main Heading -->
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
            <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                Work in Progress
            </span>
        </h1>

        <!-- Subtitle -->
        <h2 class="text-lg md:text-xl text-gray-600 mb-6 font-medium">
            This {{ $pageType ?? 'feature' }} is currently being developed
        </h2>

        <!-- Description -->
        <p class="text-gray-500 text-base mb-8 leading-relaxed max-w-lg mx-auto">
            Our development team is actively working on this module. We're committed to delivering 
            a high-quality experience and will have this ready very soon.
        </p>

        <!-- Status Cards -->
        <div class="grid md:grid-cols-2 gap-4 mb-8">
            <div class="bg-white/70 backdrop-blur-sm rounded-lg p-4 shadow-lg border border-white/30">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-3 mx-auto">
                    <i class="fa-solid fa-laptop-code text-blue-600 text-lg"></i>
                </div>
                <h3 class="font-semibold text-gray-800 mb-1">In Development</h3>
                <p class="text-gray-600 text-sm">Actively coding this feature</p>
            </div>
            
            <div class="bg-white/70 backdrop-blur-sm rounded-lg p-4 shadow-lg border border-white/30">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mb-3 mx-auto">
                    <i class="fa-solid fa-clock text-green-600 text-lg"></i>
                </div>
                <h3 class="font-semibold text-gray-800 mb-1">Coming Soon</h3>
                <p class="text-gray-600 text-sm">Expected completion very soon</p>
            </div>
        </div>

        <!-- Progress Steps -->
        <div class="mb-8">
            <h3 class="text-gray-700 font-medium mb-4">Development Progress</h3>
            <div class="flex justify-center items-center space-x-4">
                <!-- Step 1 - Complete -->
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mb-2">
                        <i class="fa-solid fa-check text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600">Planning</span>
                </div>
                
                <div class="w-8 h-1 bg-green-500 rounded"></div>
                
                <!-- Step 2 - Complete -->
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mb-2">
                        <i class="fa-solid fa-check text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600">Design</span>
                </div>
                
                <div class="w-8 h-1 bg-blue-500 rounded animate-pulse"></div>
                
                <!-- Step 3 - Current -->
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center mb-2 animate-pulse">
                        <i class="fa-solid fa-code text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600">Coding</span>
                </div>
                
                <div class="w-8 h-1 bg-gray-300 rounded"></div>
                
                <!-- Step 4 - Pending -->
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center mb-2">
                        <i class="fa-solid fa-rocket text-gray-500 text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600">Launch</span>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ url()->previous() }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                <i class="fa-solid fa-arrow-left mr-2"></i>
                Go Back
            </a>
            
            <a href="{{ route('dashboard') }}" 
               class="inline-flex items-center px-6 py-3 bg-white text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-300 shadow-lg border border-gray-200 hover:shadow-xl">
                <i class="fa-solid fa-home mr-2"></i>
                Dashboard
            </a>
        </div>

        <!-- Contact Info -->
        <div class="mt-10 pt-6 border-t border-gray-200">
            <p class="text-gray-500 text-sm">
                Need this feature urgently? 
                <a href="mailto:support@techjoint.com" class="text-blue-600 hover:text-blue-700 font-medium">Contact our team</a>
            </p>
        </div>
    </div>
</div>

<!-- Custom CSS for enhanced animations -->
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    /* Staggered pulse animations for background elements */
    .animate-pulse.delay-500 { animation-delay: 0.5s; }
    .animate-pulse.delay-1000 { animation-delay: 1s; }
    .animate-pulse.delay-2000 { animation-delay: 2s; }
    
    /* Enhanced glow effect */
    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 20px rgba(59, 130, 246, 0.3);
    }
</style>

@endsection
