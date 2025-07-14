<x-app-layout>
    <div class="bg-gradient-to-br from-slate-50 via-blue-50 to-cyan-50 min-h-screen relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_50%,rgba(59,130,246,0.1)_0%,transparent_50%)] opacity-60"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_20%,rgba(14,165,233,0.1)_0%,transparent_50%)] opacity-60"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_40%_80%,rgba(59,130,246,0.05)_0%,transparent_50%)] opacity-60"></div>
        
        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-gradient-to-br from-blue-400/20 to-cyan-400/20 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-gradient-to-br from-cyan-400/20 to-blue-400/20 rounded-full blur-xl animate-pulse delay-1000"></div>
        
        <div class="relative z-10 py-8 sm:py-12 lg:py-16 px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="text-center mb-12 sm:mb-16 lg:mb-20">
                <div class="opacity-0 translate-y-8 transition-all duration-1000 ease-out" data-animate="hero-title">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black bg-gradient-to-r from-[#016DAE] via-[#00ADE5] to-[#016DAE] bg-clip-text text-transparent leading-tight mb-6">
                        Selamat Datang di Layanan ITSA
                    </h1>
                    <p class="text-gray-600 mt-4 max-w-3xl mx-auto text-lg sm:text-xl lg:text-2xl leading-relaxed px-4 font-medium">
                        Platform layanan <span class="font-bold text-[#016DAE]">IT Security Assessment</span> (ITSA) yang profesional, terstruktur, dan terpercaya.
                    </p>
                </div>
                
                <div class="opacity-0 scale-95 transition-all duration-1000 ease-out delay-300" data-animate="hero-cta">
                    <a href="{{ route('formulir.index') }}" class="mt-8 inline-block bg-gradient-to-r from-[#016DAE] to-[#00ADE5] text-white font-bold px-8 sm:px-12 py-4 sm:py-5 rounded-full shadow-2xl hover:shadow-3xl hover:scale-105 transition-all duration-300 text-lg sm:text-xl relative overflow-hidden group">
                        <span class="relative z-10">Mulai Pengajuan ITSA</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-[#00ADE5] to-[#016DAE] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                </div>
            </div>

            <!-- About Section -->
            <div class="max-w-5xl mx-auto text-center mb-16 sm:mb-20 lg:mb-24">
                <div class="opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-500" data-animate="about-section">
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl sm:rounded-[2rem] p-8 sm:p-12 lg:p-16 shadow-2xl border border-white/20 hover:shadow-3xl hover:-translate-y-2 transition-all duration-500">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent mb-6 sm:mb-8">
                            Apa itu ITSA?
                        </h2>
                        <p class="text-gray-700 leading-relaxed text-lg sm:text-xl lg:text-2xl font-medium max-w-4xl mx-auto">
                            ITSA (IT Security Assessment) adalah proses evaluasi keamanan aplikasi dan sistem informasi untuk mendeteksi potensi kerentanan, celah keamanan, dan memberikan rekomendasi perbaikan yang komprehensif.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 lg:gap-10 max-w-7xl mx-auto mb-16 sm:mb-20 lg:mb-24">
                <div class="opacity-0 translate-x-8 transition-all duration-1000 ease-out delay-700" data-animate="stat-1">
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl p-8 sm:p-10 text-center border-t-4 border-[#00ADE5] hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#00ADE5]/5 to-[#016DAE]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <h3 class="text-5xl sm:text-6xl lg:text-7xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent mb-4 animate-pulse">56</h3>
                            <p class="text-gray-600 text-base sm:text-lg font-semibold">Aplikasi Telah Di-ITSA</p>
                        </div>
                    </div>
                </div>
                
                <div class="opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-900" data-animate="stat-2">
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl p-8 sm:p-10 text-center border-t-4 border-[#00ADE5] hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#00ADE5]/5 to-[#016DAE]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <h3 class="text-5xl sm:text-6xl lg:text-7xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent mb-4 animate-pulse delay-1000">13</h3>
                            <p class="text-gray-600 text-base sm:text-lg font-semibold">Permintaan Revisi</p>
                        </div>
                    </div>
                </div>
                
                <div class="opacity-0 -translate-x-8 transition-all duration-1000 ease-out delay-1100" data-animate="stat-3">
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl p-8 sm:p-10 text-center border-t-4 border-[#00ADE5] hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#00ADE5]/5 to-[#016DAE]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <h3 class="text-5xl sm:text-6xl lg:text-7xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent mb-4 animate-pulse delay-2000">22</h3>
                            <p class="text-gray-600 text-base sm:text-lg font-semibold">Feedback Masuk</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Systems List -->
            <div class="max-w-7xl mx-auto mb-16 sm:mb-20 lg:mb-24">
                <div class="opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-1300" data-animate="systems-title">
                    <div class="text-center mb-12 sm:mb-16">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent mb-6">
                            Beberapa Sistem yang Telah Di-ITSA
                        </h2>
                        <p class="text-gray-600 max-w-3xl mx-auto text-lg sm:text-xl font-medium">
                            Sistem dan aplikasi yang telah melalui proses IT Security Assessment dengan hasil yang memuaskan
                        </p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 lg:gap-10" id="systems-grid">
                    <!-- Systems will be populated by JavaScript -->
                </div>
            </div>

            <!-- CTA Section -->
            <div class="text-center">
                <div class="opacity-0 scale-95 transition-all duration-1000 ease-out delay-2000" data-animate="cta-section">
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl sm:rounded-[2rem] p-8 sm:p-12 lg:p-16 max-w-4xl mx-auto shadow-2xl border border-white/20 hover:shadow-3xl hover:-translate-y-2 transition-all duration-500">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent mb-6 sm:mb-8">
                            Butuh Bantuan atau Punya Pertanyaan?
                        </h2>
                        <p class="text-gray-600 mb-8 sm:mb-12 text-lg sm:text-xl lg:text-2xl font-medium">
                            Tim support kami siap membantu Anda 24/7 dengan layanan profesional dan responsif
                        </p>
                        <a href="{{ route('faq') }}" class="inline-block text-[#00ADE5] border-2 border-[#00ADE5] px-8 sm:px-12 py-4 sm:py-5 rounded-full font-bold hover:bg-[#00ADE5] hover:text-white transition-all duration-300 hover:scale-105 text-lg sm:text-xl relative overflow-hidden group">
                            <span class="relative z-10">Lihat FAQ & Panduan</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-[#016DAE] to-[#00ADE5] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
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
                description: 'Sistem manajemen akademik terintegrasi dengan fitur lengkap'
            },
            {
                name: 'Website Dinas Kominfo',
                status: 'Diperbaiki',
                year: '2025',
                url: 'https://kominfo.go.id',
                description: 'Portal informasi dan komunikasi pemerintah daerah'
            },
            {
                name: 'Aplikasi E-Office',
                status: 'Aman',
                year: '2024',
                url: 'https://office.company.com',
                description: 'Sistem otomasi perkantoran digital yang efisien'
            },
            {
                name: 'Portal E-Learning',
                status: 'Dalam Review',
                year: '2025',
                url: 'https://elearning.edu',
                description: 'Platform pembelajaran online interaktif dan modern'
            },
            {
                name: 'Sistem Keuangan',
                status: 'Aman',
                year: '2024',
                url: 'https://finance.company.com',
                description: 'Manajemen keuangan dan accounting terintegrasi'
            },
            {
                name: 'Website Corporate',
                status: 'Diperbaiki',
                year: '2025',
                url: 'https://company.com',
                description: 'Website profil perusahaan dengan desain responsif'
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
                <div class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 overflow-hidden group">
                    <div class="relative h-48 sm:h-56 lg:h-64 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                        <img src="${screenshotUrl}" 
                             alt="${system.name} screenshot" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSIzMDAiIGZpbGw9IiNGOUZBRkIiLz48Y2lyY2xlIGN4PSIyMDAiIGN5PSIxNTAiIHI9IjQwIiBmaWxsPSIjRTVFN0VCIi8+PHBhdGggZD0iTTE4MCAxMzBIMjIwVjE3MEgxODBWMTMwWiIgZmlsbD0iI0Q1RDlERCIvPjwvc3ZnPg=='">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold ${statusStyling.badge}">
                                <span class="mr-1">${statusStyling.icon}</span>
                                ${system.status}
                            </span>
                        </div>
                    </div>
                    <div class="p-6 sm:p-8">
                        <div class="mb-4">
                            <h3 class="text-xl sm:text-2xl font-black bg-gradient-to-r from-[#016DAE] to-[#00ADE5] bg-clip-text text-transparent leading-tight mb-2">
                                ${system.name}
                            </h3>
                            <p class="text-gray-600 text-sm sm:text-base font-medium leading-relaxed">
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