<style>
    ol {list-style-type: none;
    padding: 0;
    margin: 0;}
    ol.li {
        font-size: medium;
    }
</style>
  <section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <ol>
                            <li><strong class="text-info">Christmas: &nbsp;&nbsp;</strong>{{ $xmasDate }}</li><hr />
                            <li><strong>Easter: &nbsp;&nbsp;</strong>{{ $easterdate }}</li><hr />
                            <li><strong>Annunciation: &nbsp; &nbsp;</strong>{{ $annunciation }}</li><hr />
                            <li><strong>Ash Wednesday: &nbsp; &nbsp;</strong>{{ $ashWednesday }}</li><hr />
                            <li><strong>All Saints: &nbsp; &nbsp;</strong>{{ $allSaints  }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

