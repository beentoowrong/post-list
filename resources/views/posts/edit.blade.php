<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Post - Beentoowrong </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>
<body class="min-h-screen bg-slate-100">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-3">
                <a 
                href="{{ route('posts.index') }}"
                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 transition hover:bg-slate-50 hover:text-slate-900"
                title="Kembali"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>
                </a>

                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                        Edit Post
                    </h1>
                    <p class="mt-1 text-sm text-slate-500">
                        Perbarui informasi dari postingan yang dipilih
                    </p>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            
            <!-- Card Header -->
            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-base font-semibold text-slate-900">
                    Informasi Post
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Perbarui informasi berikut sesuai kebutuhan.
                </p>
            </div>

            <!-- Form -->
            <form 
                action="{{ route('posts.update', $post->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')
                
                <div class="space-y-6 px-6 py-6">
                    <!-- Image -->
                     <div>
                        <label for="image" class="mb-2 block text-sm font-semibold text-slate-700">
                            Gambar
                        </label>

                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                                <!-- Current Image -->
                                 <div class="h-20 w-28 shrink-0 overflow-hidden rounded-lg border border-slate-200 bg-white">

                                    <img
                                        src="{{ asset('storage/posts/'.$post->image) }}"
                                        alt="{{ $post->title }}"
                                        class="h-full w-full object-cover"
                                    >

                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-slate-700">
                                        Ganti gambar
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        Pilih gambar baru jika ingin mengganti gambar saat ini.
                                    </p>

                                    <input
                                        id="image"
                                        type="file"
                                        name="image"
                                        accept="image/png,image/jpeg,image/jpg"
                                        class="mt-3 block w-full cursor-pointer rounded-lg border border-slate-300 bg-white text-sm text-slate-500 file:mr-4 file:border-0 file:bg-indigo-50 file:px-4 file:py-2.5 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100"
                                    >
                                </div>
                            </div>
                        </div>

                        @error('image')
                            <p class=""mt-2 text-sm font-medium text-red-600>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div>
                        <label 
                            for="title"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Judul
                        </label>

                        <input 
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $post->title) }}"
                            placeholder="Masukan judul post"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 @error('title') border-red-400 focus:border-red-500 focus:ring-red-500/10 @enderror"
                        >
                        @error('title')
                            <p class=""mt-2 text-sm font-medium text-red-600>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label 
                            for="title"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Konten
                        </label>

                        <input 
                            id="content"
                            type="text"
                            name="content"
                            value="{{ old('title', $post->title) }}"
                            placeholder="Masukan kontent post"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 @error('title') border-red-400 focus:border-red-500 focus:ring-red-500/10 @enderror"
                        >
                        @error('content')
                            <p class=""mt-2 text-sm font-medium text-red-600>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Footer -->
                 <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4 sm:flex-row sm:justify-end">

                    <button
                        type="reset"
                        class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2"
                    >
                        Reset
                    </button>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                            />
                        </svg>

                        Update Post

                    </button>

                </div>
            </form>
        </div>
    </div>
</body>
</html>