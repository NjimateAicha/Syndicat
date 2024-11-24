
<div class="groups-list">
    @forelse ($groups as $group) <!-- Loop through the groups -->
        <div data-id="{{  }}" data-action="0" class="avatar av-m">
            {{-- Uncomment to display avatar --}}
            <div data-id="{{ $group->id }}" data-action="0" class="avatar av-m" style="background-image: url('{{ $group->avatar_url }}');"></div>
            <p>{{ strlen($group->name) > 5 ? substr($group->name, 0, 6) . '..' : $group->name }}</p>
        </div>
    @empty
        <div class="text-center text-gray-500">Aucun  disponible</div> <!-- Message when no groups are available -->
    @endforelse
</div>
