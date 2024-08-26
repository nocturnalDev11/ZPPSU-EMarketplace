import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

console.log('app.js is working');

document.addEventListener('DOMContentLoaded', () => {
    /*
    |------------------------------------------------------------------------------
    | For dark mode toggle
    |------------------------------------------------------------------------------
    */

    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    var themeToggleBtn = document.getElementById('theme-toggle');

    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', function() {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    }

    /*
    |------------------------------------------------------------------------------
    | For image preview
    |------------------------------------------------------------------------------
    */
    const fileInput = document.getElementById('fileInput');
    const preview = document.getElementById('preview');

    if (fileInput) {
        fileInput.addEventListener('change', (event) => {
            const files = Array.from(event.target.files);
            preview.innerHTML = ''; // Clear the preview area

            files.forEach((file) => {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(file);

                fileReader.onload = (e) => {
                    const url = e.target.result;
                    const size = file.size > 1024 ? (file.size > 1048576 ? Math.round(file.size / 1048576) + 'mb' : Math.round(file.size / 1024) + 'kb') : file.size + 'b';
                    const previewType = ['jpg', 'jpeg', 'png', 'gif'].includes(file.name.split('.').pop().toLowerCase());

                    const div = document.createElement('div');
                    div.classList.add('relative', 'w-32', 'h-32', 'object-cover', 'rounded', 'mb-2');

                    if (previewType) {
                        div.innerHTML = `
                            <img src="${url}" class="w-32 h-32 object-cover rounded">
                            <button class="remove-btn w-6 h-6 absolute text-center flex items-center top-0 right-0 m-2 text-white text-lg bg-red-500 hover:bg-red-500 rounded-full">
                                <span class="mx-auto my-auto">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                    </svg>
                                </span>
                            </button>
                            <div class="text-xs text-center pb-3">${size}</div>
                        `;
                    } else {
                        div.innerHTML = `
                            <svg class="fill-current w-32 h-32 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                            </svg>
                            <button class="remove-btn w-6 h-6 absolute text-center flex items-center top-0 right-0 m-2 text-white text-lg bg-red-500 hover:bg-red-500 rounded-full">
                                <span class="mx-auto my-auto">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                    </svg>
                                </span>
                            </button>
                            <div class="text-xs pb-3 text-center">${size}</div>
                        `;
                    }

                    preview.appendChild(div);

                    div.querySelector('.remove-btn').addEventListener('click', () => {
                        div.remove();
                    });
                };
            });
        });
    }
});
