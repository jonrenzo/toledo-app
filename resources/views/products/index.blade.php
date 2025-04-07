<x-layout>
    <x-slot:heading>Product <List></List></x-slot:heading>
    <x-table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['category'] }}</td>
            </tr>
        @endforeach
        </tbody>

    </x-table>
</x-layout>



<!--
<p>Tasks: </p>
<ul>
    @foreach($tasks as $task)
        <li>{{ $task }}</li>
    @endforeach
</ul>

<p>Global Variables: </p>
<p>{{ $sharedVariables }}</p>

<p>Product Key: {{ $productKey }}</p>
-->
