
<span
class="label 
{{ $level == 'company'? 'label-info':'' }}
{{ $level == 'vendor'? 'label-success':'' }}
{{ $level == 'user'? 'label-danger':'' }}
"
>
{{  trans("admin.".$level)  }}

</span>