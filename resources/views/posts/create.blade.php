<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Tambah Data Post - Beentoowrong</title>

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
                        Tambah Post
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Tambahkan postingan baru ke dalam sistem.
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
                    Lengkapi informasi berikut untuk membuat post baru.
                </p>

            </div>


            <!-- Form -->
            <form
                action="{{ route('posts.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="space-y-6 px-6 py-6">


                    <!-- Image -->
                    <div>

                        <label
                            for="image"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Gambar
                        </label>

                        <label
                            for="image"
                            class="group flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-8 transition hover:border-indigo-400 hover:bg-indigo-50/30"
                        >

                            <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-indigo-50 text-indigo-600">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                </svg>

                            </div>

                            <p class="text-sm font-medium text-slate-700">
                                Klik untuk memilih gambar
                            </p>

                            <p class="mt-1 text-xs text-slate-500">
                                PNG, JPG atau JPEG
                            </p>

                            <input
                                id="image"
                                type="file"
                                name="image"
                                accept="image/png,image/jpeg,image/jpg"
                                class="hidden"
                                onchange="previewImage(event)"
                            >

                        </label>


                        @error('image')

                            <p class="mt-2 text-sm font-medium text-red-600">
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
                            value="{{ old('title') }}"
                            placeholder="Masukkan judul post"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 @error('title') border-red-400 focus:border-red-500 focus:ring-red-500/10 @enderror"
                        >

                        @error('title')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <!-- Content -->
                    <div>

                        <label
                            for="content"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Konten
                        </label>

                        <textarea
                            id="content"
                            name="content"
                            rows="8"
                            placeholder="Masukkan konten post"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 @error('content') border-red-400 @enderror"
                        >{{ old('content') }}</textarea>

                        @error('content')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>


                <!-- Footer -->
                <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4 sm:flex-row sm:justify-end">

                    <button
                        type="reset"
                        onclick="resetImagePreview()"
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
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                        Simpan Post

                    </button>

                </div>

            </form>

        </div>

    </div>


    <script>

        // CKEditor
        CKEDITOR.replace('content');

    </script>

</body>
</html>
