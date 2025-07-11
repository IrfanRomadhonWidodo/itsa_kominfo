<x-app-layout>
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        position: relative;
    }
    
    .gradient-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(1, 109, 174, 0.03) 0%, rgba(0, 173, 229, 0.03) 100%);
        z-index: 1;
    }
    
    .glass-effect {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(1, 109, 174, 0.1);
        box-shadow: 0 8px 32px rgba(1, 109, 174, 0.1);
    }
    
    .glass-effect-modal {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(1, 109, 174, 0.15);
        box-shadow: 0 25px 50px rgba(1, 109, 174, 0.15);
    }
    
    .hover-lift {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(1, 109, 174, 0.15);
    }
    
    .gradient-text {
        background: linear-gradient(135deg, #016DAE, #00ADE5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .text-primary {
        color: #016DAE;
    }
    
    .text-primary-light {
        color: #00ADE5;
    }
    
    .text-secondary {
        color: #64748b;
    }
    
    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .accordion-content.active {
        max-height: 1000px;
    }
    
    .floating-element {
        animation: float 8s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(180deg); }
    }
    
    .fade-in {
        animation: fadeIn 0.6s ease-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .elegant-border {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #016DAE, #00ADE5) border-box;
    }
    
    .elegant-accent {
        background: linear-gradient(135deg, #016DAE 0%, #00ADE5 100%);
    }
    
    .category-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(1, 109, 174, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .category-card:hover {
        background: rgba(1, 109, 174, 0.02);
        border-color: rgba(1, 109, 174, 0.2);
        transform: translateY(-2px);
    }
    
    .accordion-button {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(1, 109, 174, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .accordion-button:hover {
        background: rgba(1, 109, 174, 0.02);
        border-color: rgba(1, 109, 174, 0.15);
    }
    
    .elegant-shadow {
        box-shadow: 0 10px 30px rgba(1, 109, 174, 0.08);
    }
    
    .elegant-shadow-lg {
        box-shadow: 0 20px 50px rgba(1, 109, 174, 0.12);
    }
</style>

<div class="gradient-bg min-h-screen relative">
    <!-- Decorative Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute top-20 left-20 w-24 h-24 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 opacity-30 floating-element"></div>
        <div class="absolute top-1/3 right-32 w-16 h-16 rounded-full bg-gradient-to-br from-blue-200 to-blue-300 opacity-25 floating-element" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-32 left-1/4 w-20 h-20 rounded-full bg-gradient-to-br from-blue-50 to-blue-100 opacity-40 floating-element" style="animation-delay: -4s;"></div>
        <div class="absolute top-1/2 left-1/2 w-12 h-12 rounded-full bg-gradient-to-br from-blue-300 to-blue-400 opacity-20 floating-element" style="animation-delay: -6s;"></div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-20">
                <!-- <div class="inline-block p-1 rounded-full elegant-border mb-6">
                    <div class="w-2 h-2 rounded-full elegant-accent"></div>
                </div> -->
                <h1 class="text-6xl font-bold gradient-text mb-6 tracking-tight">FAQ</h1>
                <p class="text-xl text-secondary max-w-2xl mx-auto leading-relaxed">
                    Temukan jawaban untuk pertanyaan yang sering diajukan seputar ITSA
                </p>
            </div>
            
            <!-- Popular Questions -->
            <div class="mb-20">
                <div class="flex items-center mb-10">
                    <div class="w-1 h-12 elegant-accent rounded-full mr-4"></div>
                    <h2 class="text-3xl font-bold text-primary">Popular Questions</h2>
                </div>
                
                <div class="space-y-6">
                    <!-- Question 1 -->
                    <div class="accordion-button rounded-2xl overflow-hidden hover-lift elegant-shadow">
                        <button class="w-full px-8 py-8 text-left hover:bg-blue-50/50 transition-all duration-300 flex items-center justify-between group" onclick="toggleAccordion('q1')">
                            <span class="font-semibold text-xl text-primary">Apa itu ITSA?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300 text-primary-light" id="q1-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5z"/>
                            </svg>
                        </button>
                        <div id="q1-content" class="accordion-content hidden px-8 pb-8">

                            <div class="text-secondary leading-relaxed text-lg">
                                ITSA (Information Technology Student Association) adalah sebuah platform/komunitas yang mewadahi mahasiswa atau individu yang tertarik pada bidang teknologi informasi. ITSA berfokus pada pengembangan skill, kolaborasi, dan inovasi di dunia IT melalui berbagai kegiatan edukatif dan kompetitif.
                            </div>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="accordion-button rounded-2xl overflow-hidden hover-lift elegant-shadow">
                        <button class="w-full px-8 py-8 text-left hover:bg-blue-50/50 transition-all duration-300 flex items-center justify-between group" onclick="toggleAccordion('q2')">
                            <span class="font-semibold text-xl text-primary">Saya mengalami error saat login/daftar, apa yang harus saya lakukan?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300 text-primary-light" id="q2-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5z"/>
                            </svg>
                        </button>
                        <div id="q2-content" class="accordion-content px-8 pb-8">
                            <div class="text-secondary leading-relaxed text-lg">
                                Pastikan koneksi internetmu stabil dan informasi yang kamu masukkan sudah benar. Jika masalah masih terjadi, coba refresh halaman atau gunakan browser lain. Kamu juga bisa menghubungi tim ITSA melalui halaman <strong class="text-primary">Kontak</strong>.
                            </div>
                        </div>
                    </div>

                    <!-- Question 3 -->
                    <div class="accordion-button rounded-2xl overflow-hidden hover-lift elegant-shadow">
                        <button class="w-full px-8 py-8 text-left hover:bg-blue-50/50 transition-all duration-300 flex items-center justify-between group" onclick="toggleAccordion('q3')">
                            <span class="font-semibold text-xl text-primary">Apakah ITSA berbayar atau gratis?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300 text-primary-light" id="q3-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5z"/>
                            </svg>
                        </button>
                        <div id="q3-content" class="accordion-content px-8 pb-8">
                            <div class="text-secondary leading-relaxed text-lg">
                                Sebagian besar layanan dan kegiatan ITSA disediakan secara <strong class="text-primary">gratis</strong>. Namun, beberapa program atau pelatihan khusus mungkin memerlukan kontribusi biaya tertentu, yang akan diinformasikan secara transparan.
                            </div>
                        </div>
                    </div>

                    <!-- Question 4 -->
                    <div class="accordion-button rounded-2xl overflow-hidden hover-lift elegant-shadow">
                        <button class="w-full px-8 py-8 text-left hover:bg-blue-50/50 transition-all duration-300 flex items-center justify-between group" onclick="toggleAccordion('q4')">
                            <span class="font-semibold text-xl text-primary">Kegiatan apa saja yang biasanya dilakukan oleh ITSA?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300 text-primary-light" id="q4-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5z"/>
                            </svg>
                        </button>
                        <div id="q4-content" class="accordion-content px-8 pb-8">
                            <div class="text-secondary leading-relaxed text-lg">
                                ITSA menyelenggarakan berbagai kegiatan seperti:
                                <ul class="list-disc list-inside mt-4 space-y-2 ml-4">
                                    <li>Pelatihan dan workshop (coding, desain, networking, dsb.)</li>
                                    <li>Webinar dan talkshow dengan narasumber profesional</li>
                                    <li>Lomba dan kompetisi IT</li>
                                    <li>Kolaborasi proyek antaranggota</li>
                                    <li>Forum diskusi dan mentoring</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- By Categories -->
            <div class="mb-20">
                <div class="flex items-center mb-10">
                    <div class="w-1 h-12 elegant-accent rounded-full mr-4"></div>
                    <h2 class="text-3xl font-bold text-primary">By Categories</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Account Category -->
                    <button class="category-card rounded-2xl p-10 text-center group hover-lift elegant-shadow" onclick="showCategory('account')">
                        <div class="w-16 h-16 mx-auto mb-6 gradient-text">
                        <svg fill="#016DAE" viewBox="0 0 24 24" class="w-full h-full">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-primary group-hover:text-primary-light transition-colors">Account</h3>
                    </button>

                    <!-- Security Category -->
                    <button class="category-card rounded-2xl p-10 text-center group hover-lift elegant-shadow" onclick="showCategory('security')">
                        <div class="w-16 h-16 mx-auto mb-6 gradient-text">
                            <svg fill="#016DAE" viewBox="0 0 24 24" class="w-full h-full">
                                <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.6 14.8,10V11H15.5C16.4,11 17,11.4 17,12V16C17,16.6 16.6,17 16,17H8C7.4,17 7,16.6 7,16V12C7,11.4 7.4,11 8,11H8.5V10C8.5,8.6 9.6,7 12,7M12,8.2C10.2,8.2 9.8,9.2 9.8,10V11H14.2V10C14.2,9.2 13.8,8.2 12,8.2Z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-primary group-hover:text-primary-light transition-colors">Security</h3>
                    </button>

                    <!-- Features Category -->
                    <button class="category-card rounded-2xl p-10 text-center group hover-lift elegant-shadow" onclick="showCategory('features')">
                        <div class="w-16 h-16 mx-auto mb-6 gradient-text">
                            <svg fill="#016DAE" viewBox="0 0 24 24" class="w-full h-full">
                                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-primary group-hover:text-primary-light transition-colors">Features</h3>
                    </button>

                    <!-- Terms of Use Category -->
                    <button class="category-card rounded-2xl p-10 text-center group hover-lift elegant-shadow" onclick="showCategory('terms')">
                        <div class="w-16 h-16 mx-auto mb-6 gradient-text">
                            <svg fill="#016DAE" viewBox="0 0 24 24" class="w-full h-full">
                                <path d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M6,20H15L18,23L15,20H18V8H12V2H6V20Z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-primary group-hover:text-primary-light transition-colors">Terms of Use</h3>
                    </button>

                    <!-- Activities Category -->
                    <button class="category-card rounded-2xl p-10 text-center group hover-lift elegant-shadow" onclick="showCategory('activities')">
                        <div class="w-16 h-16 mx-auto mb-6 gradient-text">
                            <svg fill="#016DAE" viewBox="0 0 24 24" class="w-full h-full">
                                <path d="M16,4C16.88,4 17.67,4.84 17.67,5.75C17.67,6.32 17.23,6.77 16.67,6.77C16.11,6.77 15.67,6.32 15.67,5.75C15.67,4.84 16.45,4 16,4M13,1C13.88,1 14.67,1.84 14.67,2.75C14.67,3.32 14.23,3.77 13.67,3.77C13.11,3.77 12.67,3.32 12.67,2.75C12.67,1.84 13.45,1 13,1M12,8.5L9.91,10.09C9.66,10.34 9.66,10.76 9.91,11L12,13.09L14.09,11C14.34,10.76 14.34,10.34 14.09,10.09L12,8.5M8,5.5C8.88,5.5 9.67,6.34 9.67,7.25C9.67,7.82 9.23,8.27 8.67,8.27C8.11,8.27 7.67,7.82 7.67,7.25C7.67,6.34 8.45,5.5 8,5.5Z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-primary group-hover:text-primary-light transition-colors">Activities</h3>
                    </button>

                    <!-- Feedback Category -->
                    <button class="category-card rounded-2xl p-10 text-center group hover-lift elegant-shadow" onclick="showCategory('feedback')">
                        <div class="w-16 h-16 mx-auto mb-6 gradient-text">
                            <svg fill="#016DAE" viewBox="0 0 24 24" class="w-full h-full">
                                <path d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9M10,16V19.08L13.08,16H20V4H4V16H10Z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-primary group-hover:text-primary-light transition-colors">Feedback</h3>
                    </button>
                </div>
            </div>

            <!-- Category Modal -->
            <div id="categoryModal" class="fixed inset-0 bg-black/20 backdrop-blur-sm z-50 hidden">
                <div class="flex items-center justify-center min-h-screen p-4">
                    <div class="glass-effect-modal rounded-3xl max-w-2xl w-full max-h-[80vh] overflow-y-auto elegant-shadow-lg">
                        <div class="p-10">
                            <div class="flex justify-between items-center mb-8">
                                <h3 id="categoryTitle" class="text-4xl font-bold gradient-text"></h3>
                                <button onclick="closeCategory()" class="text-gray-400 hover:text-primary transition-colors">
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                                    </svg>
                                </button>
                            </div>
                            <div id="categoryContent" class="space-y-8"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Help Center -->
            <div class="text-center">
                <div class="glass-effect rounded-3xl p-10 max-w-md mx-auto elegant-shadow">
                    <p class="text-secondary text-lg leading-relaxed">
                        Tidak menemukan jawaban yang kamu cari? Kunjungi 
                        <a href="#" class="text-primary font-semibold hover:text-primary-light transition-colors underline decoration-2 underline-offset-2">Help Center</a> kami.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleAccordion(id) {
    const content = document.getElementById(id + '-content');
    const icon = document.getElementById(id + '-icon');

    // Tutup semua konten lainnya
    document.querySelectorAll('.accordion-content').forEach(el => {
        if (el.id !== id + '-content') {
            el.classList.add('hidden'); // ini yang penting
            const otherIcon = document.getElementById(el.id.replace('-content', '-icon'));
            if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
        }
    });

    // Toggle konten yang diklik
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
    } else {
        content.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
    }
}


        function showCategory(category) {
            const modal = document.getElementById('categoryModal');
            const title = document.getElementById('categoryTitle');
            const content = document.getElementById('categoryContent');
            
            const categoryData = {
                account: {
                    title: 'Account',
                    questions: [
                        {
                            q: 'Saya lupa password akun saya. Bagaimana cara meresetnya?',
                            a: 'Kamu bisa klik tombol "Lupa Password?" di halaman login. Masukkan email yang terdaftar, lalu ikuti instruksi yang dikirimkan ke email tersebut untuk mengganti password kamu.'
                        },
                        {
                            q: 'Apakah saya bisa mengubah data akun saya setelah mendaftar?',
                            a: 'Ya, kamu bisa mengubah data seperti nama, email, dan foto profil melalui menu "Pengaturan Akun" setelah login. Jika ada kendala, silakan hubungi admin ITSA melalui kontak yang tersedia.'
                        }
                    ]
                },
                security: {
                    title: 'Security',
                    questions: [
                        {
                            q: 'Apakah data saya aman di ITSA?',
                            a: 'Ya, ITSA menggunakan enkripsi dan protokol keamanan terkini untuk melindungi data pengguna. Kami berkomitmen menjaga privasi dan keamanan informasi Anda.'
                        }
                    ]
                },
                features: {
                    title: 'Features',
                    questions: [
                        {
                            q: 'Apakah website ITSA bisa diakses lewat HP?',
                            a: 'Ya, website ITSA dirancang dengan desain responsif, sehingga dapat diakses dengan baik melalui desktop, tablet, maupun smartphone.'
                        }
                    ]
                },
                terms: {
                    title: 'Terms of Use',
                    questions: [
                        {
                            q: 'Apa saja aturan yang harus diikuti anggota ITSA?',
                            a: 'Anggota ITSA diharapkan menjaga etika komunikasi, menghormati sesama anggota, dan tidak melakukan aktivitas yang merugikan komunitas.'
                        }
                    ]
                },
                activities: {
                    title: 'Activities',
                    questions: [
                        {
                            q: 'Apa tujuan utama ITSA dibentuk?',
                            a: 'Tujuan utama ITSA adalah untuk menjadi wadah belajar, berbagi, dan berkembang bersama di bidang teknologi informasi. ITSA mendorong kolaborasi antaranggota, memperluas wawasan teknologi, serta membentuk generasi yang siap bersaing di dunia digital.'
                        }
                    ]
                },
                feedback: {
                    title: 'Feedback',
                    questions: [
                        {
                            q: 'Bagaimana cara menghubungi tim ITSA jika saya punya pertanyaan lain?',
                            a: 'Silakan kunjungi halaman Kontak Kami di website ITSA, atau kirim pesan langsung ke email/akun media sosial resmi yang tertera di footer halaman.'
                        },
                        {
                            q: 'Di mana saya bisa mendapatkan info terbaru dari ITSA?',
                            a: 'Kamu bisa mendapatkan informasi terbaru melalui: Website resmi ITSA (halaman Berita atau Pengumuman), Akun media sosial ITSA (Instagram, LinkedIn, dsb.), Email newsletter (jika tersedia)'
                        },
                        {
                            q: 'Apakah ITSA punya komunitas di media sosial?',
                            a: 'Ya, ITSA aktif di berbagai media sosial seperti Instagram, Twitter, dan LinkedIn. Silakan follow akun-akun tersebut untuk mendapatkan update kegiatan, tips teknologi, dan info menarik lainnya.'
                        }
                    ]
                }
            };

            const data = categoryData[category];
            title.textContent = data.title;
            
            content.innerHTML = data.questions.map(item => `
                <div class="border-b border-gray-200 pb-8 last:border-b-0">
                    <h4 class="font-semibold text-primary mb-4 text-xl">${item.q}</h4>
                    <p class="text-secondary leading-relaxed text-lg">${item.a}</p>
                </div>
            `).join('');
            
            modal.classList.remove('hidden');
            modal.classList.add('fade-in');
            document.body.style.overflow = 'hidden';
        }

        function closeCategory() {
            const modal = document.getElementById('categoryModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('categoryModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCategory();
            }
        });

        // Show the third question as expanded by default
        window.onload = function() {
            const content = document.getElementById('q3-content');
            const icon = document.getElementById('q3-icon');
            content.classList.add('active');
            icon.style.transform = 'rotate(180deg)';
        };
    </script>
</div>
</x-app-layout>