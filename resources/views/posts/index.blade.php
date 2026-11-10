<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Data Posts - Beentoowrong</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100">

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    Data Posts
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola semua postingan yang tersedia.
                </p>
            </div>

            <a
                href="{{ route('posts.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 4v16m8-8H4"
                    />
                </svg>

                Tambah Post
            </a>

        </div>


        <!-- Card -->
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <!-- Table Header -->
            <div class="border-b border-slate-200 px-6 py-5">
                <div class="flex items-center justify-between">

                    <div>
                        <h2 class="text-base font-semibold text-slate-900">
                            Daftar Postingan
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Berikut adalah seluruh data post.
                        </p>
                    </div>

                    <div class="hidden rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600 sm:block">
                        {{ $posts->total() }} Post
                    </div>

                </div>
            </div>


            @if ($posts->count())

                <!-- Table -->
                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        <thead class="border-b border-slate-200 bg-slate-50">
                            <tr>

                                <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Gambar
                                </th>

                                <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Judul
                                </th>

                                <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Content
                                </th>

                                <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Aksi
                                </th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @foreach ($posts as $post)

                                <tr class="transition hover:bg-slate-50">

                                    <!-- Image -->
                                    <td class="whitespace-nowrap px-6 py-5">

                                        <div class="h-16 w-24 overflow-hidden rounded-lg border border-slate-200 bg-slate-100">

                                            <img
                                                src="{{ asset('storage/posts/'.$post->image) }}"
                                                alt="{{ $post->title }}"
                                                class="h-full w-full object-cover"
                                            >

                                        </div>

                                    </td>


                                    <!-- Title -->
                                    <td class="max-w-xs px-6 py-5">

                                        <div class="font-semibold text-slate-900">
                                            {{ $post->title }}
                                        </div>

                                    </td>


                                    <!-- Content -->
                                    <td class="max-w-lg px-6 py-5">

                                        <div class="line-clamp-2 text-sm leading-6 text-slate-500">
                                            {!! strip_tags($post->content) !!}
                                        </div>

                                    </td>


                                    <!-- Actions -->
                                    <td class="px-6 py-5">

                                        <div class="flex items-center justify-center gap-2">

                                            <!-- Show -->
                                            <a
                                                href="{{ route('posts.show', $post->id) }}"
                                                title="Lihat"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 transition hover:border-slate-300 hover:bg-slate-50 hover:text-slate-900"
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
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                    />
                                                </svg>
                                            </a>


                                            <!-- Edit -->
                                            <a
                                                href="{{ route('posts.edit', $post->id) }}"
                                                title="Edit"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-indigo-100 bg-indigo-50 text-indigo-600 transition hover:bg-indigo-100 hover:text-indigo-700"
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
                                            </a>


                                            <!-- Delete -->
                                            <form
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus post ini?');"
                                                action="{{ route('posts.destroy', $post->id) }}"
                                                method="POST"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    title="Hapus"
                                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-red-100 bg-red-50 text-red-500 transition hover:bg-red-100 hover:text-red-600"
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
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                        />
                                                    </svg>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                <!-- Pagination -->
                <div class="border-t border-slate-200 px-6 py-4">
                    {{ $posts->links() }}
                </div>


            @else

                <!-- Empty State -->
                <div class="px-6 py-16 text-center">

                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-7 w-7 text-slate-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h5l2 2h7a2 2 0 012 2v10a2 2 0 01-2 2z"
                            />
                        </svg>

                    </div>

                    <h3 class="mt-4 text-sm font-semibold text-slate-900">
                        Belum ada post
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Data post belum tersedia saat ini.
                    </p>

                    <a
                        href="{{ route('posts.create') }}"
                        class="mt-5 inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700"
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
                                d="M12 4v16m8-8H4"
                            />
                        </svg>

                        Tambah Post
                    </a>

                </div>

            @endif

        </div>

    </div>


    <!-- Toast Notification -->
    @if (session()->has('success') || session()->has('error'))

        <div
            id="toast"
            class="fixed right-5 top-5 z-50 flex max-w-sm items-center gap-3 rounded-xl border bg-white px-4 py-3 shadow-lg"
        >

            @if (session()->has('success'))

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
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

                </div>

                <div>
                    <p class="text-sm font-semibold text-slate-900">
                        Berhasil
                    </p>

                    <p class="text-xs text-slate-500">
                        {{ session('success') }}
                    </p>
                </div>

            @else

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

                </div>

                <div>
                    <p class="text-sm font-semibold text-slate-900">
                        Gagal
                    </p>

                    <p class="text-xs text-slate-500">
                        {{ session('error') }}
                    </p>
                </div>

            @endif

        </div>

        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast');

                if (toast) {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateY(-10px)';
                    toast.style.transition = 'all 0.3s ease';

                    setTimeout(() => toast.remove(), 300);
                }
            }, 3000);
        </script>

    @endif

</body>
</html>
