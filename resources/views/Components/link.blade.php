 @props(["active"=>false] )
 <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
<a
    {{ $attributes }}
    aria-current="page"
    @class([
     "bg-gray-900"=>$active,
     "text-white"=>$active,
     "text-gray-300"=>$active==false,
     "hover:bg-white/5"=>$active==false,
     "hover:text-white"=>$active==false,
     "rounded-md",
     "px-3",
     "py-2" ,
     "text-sm",
     "font-medium "])
>
    {{ $slot}}
</a>
