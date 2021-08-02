<script>
    window.location.href = "{{$assignAward->entity->failed_page}}"+"?entity="+window.btoa("{{$assignAward->entity->name}}")+"&entity_web="+window.btoa("{{$assignAward->entity->website}}");
</script>