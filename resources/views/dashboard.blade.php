<x-app-layout>
    <div class="bg-gradient-to-br from-slate-50 via-blue-50 to-cyan-50 min-h-screen relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_50%,rgba(59,130,246,0.08)_0%,transparent_50%)] opacity-60"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_20%,rgba(14,165,233,0.08)_0%,transparent_50%)] opacity-60"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_40%_80%,rgba(59,130,246,0.05)_0%,transparent_50%)] opacity-60"></div>
        
        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-gradient-to-br from-blue-400/15 to-cyan-400/15 rounded-full blur-2xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-gradient-to-br from-cyan-400/15 to-blue-400/15 rounded-full blur-2xl animate-pulse delay-1000"></div>
        
        <div class="relative z-10 py-12 sm:py-16 lg:py-20 px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="max-w-7xl mx-auto mb-20 sm:mb-24 lg:mb-28">
                <div class="opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate="hero-title">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                        <!-- Left Content -->
                        <div class="text-left space-y-6">
                            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black bg-gradient-to-r from-[#016DAE] via-[#00ADE5] to-[#016DAE] bg-clip-text text-transparent leading-tight">
                                SELAMAT DATANG
                            </h1>
                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900">
                                DI LAYANAN ITSA
                            </h2>
                            <p class="text-gray-600 text-lg sm:text-xl leading-relaxed font-medium max-w-xl">
                                Platform layanan IT Security Assessment yang profesional, terstruktur, dan terpercaya. Kami membantu mengamankan sistem dan aplikasi Anda dari berbagai ancaman keamanan siber.
                            </p>
                            <div class="pt-4">
                                <a href="{{ route('formulir.index') }}" class="inline-block bg-gradient-to-r from-[#016DAE] to-[#00ADE5] text-white font-bold px-10 sm:px-12 py-4 sm:py-5 rounded-full shadow-2xl hover:shadow-3xl hover:scale-105 transition-all duration-300 text-lg sm:text-xl relative overflow-hidden group">
                                    <span class="relative z-10 flex items-center">
                                        Mulai Pengajuan
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L8 4l8 8-8 8 2-2 6-6-6-6z"></path>
                                        </svg>
                                    </span>
                                    <div class="absolute inset-0 bg-gradient-to-r from-[#00ADE5] to-[#016DAE] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Right Image -->
                        <div class="flex justify-center lg:justify-end">
                            <div class="w-full max-w-md lg:max-w-lg">
                                <div class="relative rounded-3xl shadow-2xl overflow-hidden hover:shadow-3xl hover:scale-105 transition-all duration-500 aspect-square">
                                    <img src="https://static.banyumaskab.go.id/website/images/website_1302200819015e44a40589457.jpg" 
                                         alt="IT Security Assessment" 
                                         class="w-full h-full object-cover"
                                         onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjQwMCIgdmlld0JveD0iMCAwIDQwMCA0MDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSI0MDAiIGZpbGw9IiNGOUZBRkIiLz48Y2lyY2xlIGN4PSIyMDAiIGN5PSIyMDAiIHI9IjYwIiBmaWxsPSIjRTVFN0VCIi8+PHBhdGggZD0iTTE4MCAyMDBIMjIwVjI0MEgxODBWMjAwWiIgZmlsbD0iI0Q1RDlERCIvPjwvc3ZnPg=='">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Section -->
            <div class="max-w-7xl mx-auto mb-20 sm:mb-24 lg:mb-28">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                    <div class="opacity-0 translate-x-8 transition-all duration-1000 ease-out delay-700" data-animate="stat-1">
                        <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl p-10 text-center border-t-4 border-[#00ADE5] hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 relative overflow-hidden group h-48 flex flex-col justify-center">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#00ADE5]/5 to-[#016DAE]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <h3 class="text-6xl lg:text-7xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent mb-4 animate-pulse">56</h3>
                                <p class="text-gray-600 text-lg font-semibold">Aplikasi Telah Di-ITSA</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-900" data-animate="stat-2">
                        <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl p-10 text-center border-t-4 border-[#00ADE5] hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 relative overflow-hidden group h-48 flex flex-col justify-center">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#00ADE5]/5 to-[#016DAE]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <h3 class="text-6xl lg:text-7xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent mb-4 animate-pulse delay-1000">13</h3>
                                <p class="text-gray-600 text-lg font-semibold">Permintaan Revisi</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="opacity-0 -translate-x-8 transition-all duration-1000 ease-out delay-1100" data-animate="stat-3">
                        <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl p-10 text-center border-t-4 border-[#00ADE5] hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 relative overflow-hidden group h-48 flex flex-col justify-center">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#00ADE5]/5 to-[#016DAE]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <h3 class="text-6xl lg:text-7xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent mb-4 animate-pulse delay-2000">22</h3>
                                <p class="text-gray-600 text-lg font-semibold">Feedback Masuk</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Systems List Section -->
            <div class="max-w-7xl mx-auto mb-20 sm:mb-24 lg:mb-28">
                <div class="opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-1300" data-animate="systems-title">
                    <div class="text-center mb-16 sm:mb-20">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent mb-6">
                            Beberapa Sistem yang Telah Di-ITSA
                        </h2>
                        <p class="text-gray-600 max-w-3xl mx-auto text-lg sm:text-xl font-medium">
                            Sistem dan aplikasi yang telah melalui proses IT Security Assessment dengan hasil yang memuaskan
                        </p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10" id="systems-grid">
                    <!-- Systems will be populated by JavaScript -->
                </div>
            </div>

            <!-- CTA Section -->
            <div class="max-w-7xl mx-auto">
                <div class="text-center">
                    <div class="opacity-0 scale-95 transition-all duration-1000 ease-out delay-2000" data-animate="cta-section">
                        <div class="bg-white/80 backdrop-blur-xl rounded-3xl sm:rounded-[2rem] p-12 lg:p-16 max-w-4xl mx-auto shadow-2xl border border-white/20 hover:shadow-3xl hover:-translate-y-2 transition-all duration-500">
                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent mb-8">
                                Butuh Bantuan atau Punya Pertanyaan?
                            </h2>
                            <p class="text-gray-600 mb-12 text-lg sm:text-xl lg:text-2xl font-medium">
                                Tim support kami siap membantu Anda 24/7 dengan layanan profesional dan responsif
                            </p>
                            <a href="{{ route('faq') }}" class="inline-block text-[#00ADE5] border-2 border-[#00ADE5] px-10 sm:px-12 py-4 sm:py-5 rounded-full font-bold hover:bg-[#00ADE5] hover:text-white transition-all duration-300 hover:scale-105 text-lg sm:text-xl relative overflow-hidden group">
                                <span class="relative z-10">Lihat FAQ & Panduan</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-[#016DAE] to-[#00ADE5] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample systems data with enhanced information
        const systemsData = [
            {
                name: 'Sistem Informasi Akademik',
                status: 'Aman',
                year: '2024',
                url: 'https://academic.university.edu',
                description: 'Sistem manajemen akademik terintegrasi dengan fitur lengkap untuk mahasiswa dan dosen'
            },
            {
                name: 'Website Dinas Kominfo',
                status: 'Diperbaiki',
                year: '2025',
                url: 'https://kominfo.go.id',
                description: 'Portal informasi dan komunikasi pemerintah daerah yang informatif'
            },
            {
                name: 'Aplikasi E-Office',
                status: 'Aman',
                year: '2024',
                url: 'https://office.company.com',
                description: 'Sistem otomasi perkantoran digital yang efisien dan terintegrasi'
            },
            {
                name: 'Portal E-Learning',
                status: 'Dalam Review',
                year: '2025',
                url: 'https://elearning.edu',
                description: 'Platform pembelajaran online interaktif dengan fitur modern'
            },
            {
                name: 'Sistem Keuangan',
                status: 'Aman',
                year: '2024',
                url: 'https://finance.company.com',
                description: 'Manajemen keuangan dan accounting yang aman dan terpercaya'
            },
            {
                name: 'Website Corporate',
                status: 'Diperbaiki',
                year: '2025',
                url: 'https://company.com',
                description: 'Website profil perusahaan dengan desain responsif dan modern'
            }
        ];

        // Function to get website screenshot using API
        function getWebsiteScreenshot(url) {
            return `https://image.thum.io/get/width/400/crop/300/noanimate/${encodeURIComponent(url)}`;
        }

        // Function to get status styling
        function getStatusStyling(status) {
            const styles = {
                'aman': {
                    badge: 'bg-green-100 text-green-800 border border-green-200',
                    icon: '🛡️'
                },
                'diperbaiki': {
                    badge: 'bg-yellow-100 text-yellow-800 border border-yellow-200',
                    icon: '🔧'
                },
                'dalam review': {
                    badge: 'bg-blue-100 text-blue-800 border border-blue-200',
                    icon: '👀'
                }
            };
            return styles[status.toLowerCase()] || styles['aman'];
        }

        // Function to create system card with enhanced design
        function createSystemCard(system, index) {
            const card = document.createElement('div');
            card.className = 'opacity-0 translate-y-8 transition-all duration-1000 ease-out';
            card.setAttribute('data-animate', `system-${index}`);
            card.style.transitionDelay = `${1500 + index * 200}ms`;
            
            const screenshotUrl = getWebsiteScreenshot(system.url);
            const statusStyling = getStatusStyling(system.status);
            
            card.innerHTML = `
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 overflow-hidden group h-full">
                    <div class="relative h-56 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                        <img src="${screenshotUrl}" 
                             alt="${system.name} screenshot" 
                             class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-500"
                             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSIzMDAiIGZpbGw9IiNGOUZBRkIiLz48Y2lyY2xlIGN4PSIyMDAiIGN5PSIxNTAiIHI9IjQwIiBmaWxsPSIjRTVFN0VCIi8+PHBhdGggZD0iTTE4MCAxMzBIMjIwVjE3MEgxODBWMTMwWiIgZmlsbD0iI0Q1RDlERCIvPjwvc3ZnPg=='">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold ${statusStyling.badge} backdrop-blur-sm">
                                <span class="mr-1">${statusStyling.icon}</span>
                                ${system.status}
                            </span>
                        </div>
                    </div>
                    <div class="p-6 sm:p-8 flex flex-col justify-between h-44">
                        <div class="mb-4">
                            <h3 class="text-xl sm:text-2xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent leading-tight mb-3">
                                ${system.name}
                            </h3>
                            <p class="text-gray-600 text-sm sm:text-base font-medium leading-relaxed line-clamp-3">
                                ${system.description}
                            </p>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-500 text-sm font-medium">📅 ${system.year}</span>
                            </div>
                            <a href="${system.url}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center text-[#00ADE5] hover:text-[#016DAE] font-semibold text-sm transition-colors duration-200">
                                <span class="mr-1">🔗</span>
                                Kunjungi
                            </a>
                        </div>
                    </div>
                </div>
            `;
            
            return card;
        }

        // Function to populate systems grid
        function populateSystemsGrid() {
            const grid = document.getElementById('systems-grid');
            systemsData.forEach((system, index) => {
                const card = createSystemCard(system, index);
                grid.appendChild(card);
            });
        }

        // Enhanced animation observer with better performance
        function createAnimationObserver() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        
                        // Add staggered animation
                        requestAnimationFrame(() => {
                            element.classList.remove('opacity-0', 'translate-y-8', 'translate-x-8', '-translate-x-8', 'scale-95');
                            element.classList.add('opacity-100', 'translate-y-0', 'translate-x-0', 'scale-100');
                        });
                        
                        observer.unobserve(element);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '100px'
            });

            return observer;
        }

        // Initialize animations with better performance
        function initializeAnimations() {
            const observer = createAnimationObserver();
            
            // Observe all animated elements
            const animatedElements = document.querySelectorAll('[data-animate]');
            animatedElements.forEach(element => {
                observer.observe(element);
            });
        }

        // Enhanced mouse interaction effects
        function initializeMouseEffects() {
            const cards = document.querySelectorAll('.backdrop-blur-xl');
            
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Populate systems grid
            populateSystemsGrid();
            
            // Initialize animations after a short delay
            setTimeout(() => {
                initializeAnimations();
                initializeMouseEffects();
            }, 100);
        });

        // Add smooth scrolling for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</x-app-layout>