program BinarySearch;

var
  arr: array[1..10] of integer = (1, 3, 5, 7, 9, 11, 13, 15, 17, 19);
  key, low, high, mid: integer;
  found: boolean;

begin
  writeln('Enter key value to search:');
  readln(key);

  low := 1;
  high := 10;
  found := false;

  while (low <= high) and (not found) do
  begin
    mid := (low + high) div 2;

    if arr[mid] = key then
    begin
      found := true;
      writeln(key, ' found at position ', mid);
    end
    else if arr[mid] > key then
      high := mid - 1
    else
      low := mid + 1;
  end;

  if not found then
    writeln(key, ' not found in the array');
end.
