<x-layout title="Admin Panel">

    <div class="admin-panel">

        <h1 class="page-title">Admin Panel</h1>

        @if(session('success'))
            <p class="movie-feedback movie-feedback-success">
                {{ session('success') }}
            </p>
        @endif

        <h2 class="section-title">Users</h2>

        <div class="admin-list">

            @foreach($users as $user)
                <div class="admin-row">

                    <div class="admin-user">
                        <strong>{{ $user->name }}</strong>
                        <span>{{ $user->email }}</span>
                    </div>

                    <div class="admin-actions">
                        <span class="admin-role">
                            {{ $user->role === 'admin' ? 'Admin' : 'User' }}
                        </span>

                        @if(auth()->id() !== $user->id)
                            <form action="{{ route('admin.users.toggle', $user) }}"
                                  method="POST">
                                @csrf

                                <button type="submit"
                                        class="admin-switch {{ $user->role === 'admin' ? 'is-active' : '' }}"
                                        role="switch"
                                        aria-checked="{{ $user->role === 'admin' ? 'true' : 'false' }}"
                                        aria-label="Change admin role for {{ $user->name }}">
                                    <span class="admin-switch-knob"></span>
                                </button>
                            </form>
                        @else
                            <span class="admin-self">Your account</span>
                        @endif
                    </div>

                </div>
            @endforeach

        </div>

        <h2 class="section-title">Movies</h2>

        <div class="admin-list">

            @forelse($movies as $movie)
                <div class="admin-row">

                    <div class="admin-user">
                        <strong>{{ $movie->title }}</strong>
                        <span>
                            Creator ID: {{ $movie->created_by_user_id }}
                            |
                            {{ $movie->is_featured ? 'Featured' : 'Not featured' }}
                        </span>
                    </div>

                    <a href="{{ route('movies.show', $movie) }}"
                       class="button button-secondary">
                        Manage Movie
                    </a>

                </div>
            @empty
                <p>No movies found.</p>
            @endforelse

        </div>

    </div>

</x-layout>
