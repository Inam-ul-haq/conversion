<select name="role" class="form-control" >
      @foreach($table as $table)
        <option value="{{ $table }} "> {{ $table }} </option>
      @endforeach
</select>