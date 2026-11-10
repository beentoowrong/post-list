<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Detail Data Post - SantriKoding.com</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100">

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

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
                        Detail Post
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Informasi lengkap dari postingan yang dipilih.
                    </p>
                </div>

            </div>


            <!-- Edit Button -->
            <a
                href="{{ route('posts.edit', $post->id) }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
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

                Edit Post

            </a>

        </div>


        <!-- Main Card -->
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <!-- Image -->
            <div class="bg-slate-100">

                <img
                    src="{{ asset('storage/posts/'.$post->image) }}"
                    alt="{{ $post->title }}"
                    class="mx-auto max-h-[550px] w-full object-cover"
                >

            </div>


            <!-- Content -->
            <div class="mx-auto max-w-4xl px-6 py-8 sm:px-10 sm:py-10">

                <!-- Title -->
                <h2 class="text-3xl font-bold leading-tight tracking-tight text-slate-900 sm:text-4xl">
                    {{ $post->title }}
                </h2>


                <!-- Divider -->
                <div class="my-6 h-px bg-slate-200"></div>


                <!-- Post Content -->
                <article class="prose prose-slate max-w-none text-slate-600">

                    {!! $post->content !!}

                </article>

            </div>

        </div>

    </div>

</body>
</html>
