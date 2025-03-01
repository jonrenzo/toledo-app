<form method="POST" action="/token">
    @csrf

    Search Term: <input type="text" name="term" value=""/>
    <button type="submit">Go</button>
</form>

