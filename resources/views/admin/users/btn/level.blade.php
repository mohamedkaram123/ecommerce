
<span
class="label 
{{ $level == 'company'? 'badge badge-info':'' }}
{{ $level == 'vendor'? 'badge badge-success':'' }}
{{ $level == 'user'? 'badge badge-danger':'' }}
"
>
{{  trans("admin.".$level)  }}

</span>