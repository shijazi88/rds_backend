@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="row">
    @foreach ($commands as $command)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $command['label'] }}</h5>
                    <p class="card-text">
                        <strong>Command:</strong> {{ $command['slug'] }}<br>
                        <strong>Example:</strong> {{ $command['example'] }}<br>
                        <strong>Explanation:</strong> {{ $command['explanation'] }}
                    </p>
                    <form method="POST" action="{{ route('admin.boxes.send-command', [$box, $command['slug']]) }}">
                        @csrf
                        @if ($command['slug'] === 'pass-code-unlock')
                            <div class="form-group">
                                <label for="pass_code">Enter Pass Code:</label>
                                <input type="number" name="pass_code" id="pass_code" class="form-control" required>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary mt-2">Send Command</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
