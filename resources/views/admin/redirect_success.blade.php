<script>
    window.location.href = "{{$assignAward->entity->success_page}}"+"?logo="+window.btoa("{{$assignAward->award->award_logo}}")+"&bussiness="+window.btoa("{{$assignAward->company->name}}")+"&web="+window.btoa("{{$assignAward->company->website}}");
</script>