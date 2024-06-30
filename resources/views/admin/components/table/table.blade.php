<div class="bg-gray-800 border-[1px] border-gray-500 overflow-x-auto rounded-2xl mt-5">
    <table class="w-full text-md text-white shadow-md overflow-hidden rounded-2xl ">
        <tbody>
        <tr class="border-b border-gray-500">
            @foreach($columns as $column)
                <th class="text-center py-3 px-5">{{ $column }}</th>
            @endforeach
        </tr>
        <tbody>
        @foreach($rows as $index => $row)
            <tr class="rounded-2xl odd:bg-gray-600 bg-gray-700">
                @foreach($row as $value)
                    <td class="text-center py-2 ">
                        {!! $value  !!}
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
