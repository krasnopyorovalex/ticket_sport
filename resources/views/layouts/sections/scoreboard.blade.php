<section id="matches" class="scoreboard">
    <div class="container">
        <div class="tabs">
            <ul>
                @foreach($championships as $championship)
                    <li>
                        @if($championship->image)
                        <img src="{{ $championship->image->path }}" alt="{{ $championship->image->alt }}" title="{{ $championship->image->title }}">
                        @endif
                        {{ $championship->name }}
                    </li>
                @endforeach
            </ul>
            <div class="content">
                @foreach($championships as $championship)
                <div class="{{ $loop->index > 0 ? 'hidden' : '' }}">
                    @if($championship->stages)
                        <div class="tab_list-stages">
                            @foreach($championship->stages as $stage)
                                <div>
                                    {{ $stage->name }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="list_commands">
                        @foreach($championship->teams as $team)
                            <div>
                                @if($team->image)
                                    <img src="{{ $team->image->path }}" alt="{{ $team->image->alt }}" title="{{ $team->image->title }}">
                                @endif
                                <span>{{ $team->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
