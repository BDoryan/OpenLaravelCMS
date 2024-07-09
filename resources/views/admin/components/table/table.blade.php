<div class="olc-bg-gray-800 olc-border-[1px] olc-border-gray-500 olc-overflow-x-auto olc-rounded-2xl olc-mt-5">
    <table class="olc-w-full olc-text-md olc-text-white olc-shadow-md olc-rounded-2xl">
        <tbody>
        <tr class="olc-border-b olc-border-gray-500">
            @foreach($columns as $column)
                <th class="olc-text-center olc-py-3 olc-px-5">{{ $column }}</th>
            @endforeach
        </tr>
        <tbody>
        @foreach($rows as $index => $row)
            <tr class="olc-rounded-2xl odd:olc-bg-gray-600 olc-bg-gray-700">
                @foreach($row as $value)
                    <td class="olc-text-center olc-py-2">
                        {!! $value  !!}
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
