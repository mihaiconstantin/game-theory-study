{{--error partial--}}


<div class="instruction-box">
    <div class="condition-title title">An error occurred</div>

    <div id="instruction-box-message" class="condition-description">
        Please try to refresh the page or use the browser button to navigate back and try again. If the error persists, please navigate to this link <a href="http://95.85.57.57/game/play/1/1">http://95.85.57.57/game/play/1/1</a> to reload the games.
        <br><br>
        If the error still persists, please contact <strong><i>e.dietvorst@uvt.nl</i></strong> and provide the following link: <strong>{{Request::url()}}</strong>.
        <br>
        Thank you!
        <br>
    </div>

    <div class="choice-options text-center">
        <button type="button" onClick="window.location.reload();" id="refresh" class="btn btn-primary">Refresh</button>
    </div>
</div>