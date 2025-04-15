
<h2 class="text-primary">Bảng điều khiển</h2>

<div class="list-group">
    <a href="/profile" class="list-group-item list-group-item-action">Hồ sơ người dùng</a>
    @if ($user->type_of_user == 'GV')
    <a href="/schedule" class="list-group-item list-group-item-action">Lịch dạy học</a>
    @else 
    <a href="/schedule" class="list-group-item list-group-item-action">Lịch học</a>
    @endif
</div>