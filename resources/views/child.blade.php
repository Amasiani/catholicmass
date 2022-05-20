<style>

    .card-body {
        width: 100%;
    }

    @media only screen and (min-width: 600px) {
        /** For Tablets: */
        .card-body {width: 50%;}
    }

    @media only screen and (min-width: 768px) {
        /** For Desktops: */
        .card-body {width: 41.66%;}
    }
    ol {list-style-type: none;
    padding: 0;
    margin: 0;
    }

    hr {
        display: inline-block;
        width: 70%;
    }

    @media only screen and (min-width: 600px)  {
        /* For tablets: */
        hr {width: 50%;}
    }

    @media only screen and (min-width: 768px) {
        /* For desktop: */
        hr {width: 41.66%;}
    }
    li {
        font-size: medium;
    }
    .card-info {
        color: blue;
    }
    li {
        width: 100%;
    }

    @media only screen and (min-width: 600px) {
        /* For tablets: */
        li {width: 50%;}
    }

    @media only screen and (min-width: 768px) {
        /* For desktop: */        
        li {width: 41.66%;}
    }
    [class*="col"] {
        width: 100%;
    }
    @media only screen and (min-width: 600px) {
        /* For tablets: */
        .col-s-1 {width: 8.33%;}
        .col-s-2 {width: 16.66%;}
        .col-s-3 {width: 25%;}
        .col-s-4 {width: 33.33%;}
        .col-s-5 {width: 41.66%;}
        .col-s-6 {width: 50%;}
        .col-s-7 {width: 58.33%;}
        .col-s-8 {width: 66.66%;}
        .col-s-9 {width: 75%;}
        .col-s-10 {width: 83.33%;}
        .col-s-11 {width: 91.66%;}
        .col-s-12 {width: 100%;}
    }

    @media only screen and (min-width: 768px) {
        /* For desktop: */
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}
    }
</style>
  <section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <ol>
                            <li><strong>Baptism of our Lord: &nbsp;&nbsp;</strong>{{ $baptismLord }}</li><hr />
                            <li><strong>Ash Wednesday: &nbsp;&nbsp;</strong>{{ $ashWednesday }}</li><hr />
                            <li><strong>Annunciation: &nbsp; &nbsp;</strong>{{ $annunciation }}</li><hr />
                            <li><strong>Palm Sunday: &nbsp;&nbsp;</strong>{{ $PalmSunday }}</li><hr />
                            <li><strong>Easter Sunday: &nbsp;&nbsp;</strong>{{ $easterdate }}</li><hr />
                            <li><strong>Ascension: &nbsp;&nbsp;</strong>{{ $ascension }}</li><hr />
                            <li><strong>Pentecost Sunday: &nbsp;&nbsp;</strong>{{ $pentecost }}</li><hr />
                            <li><strong>Corpus Christi: &nbsp; &nbsp;</strong>{{ $corpusChristi }}</li><hr />
                            <li><strong>All Saints: &nbsp; &nbsp;</strong>{{ $allSaints  }}</li><hr />
                            <li><strong>Christ the King: &nbsp; &nbsp;</strong>{{ $christKing }}</li><hr />
                            <li><strong class="text-info">Christmas day: &nbsp;&nbsp;</strong>{{ $xmasDate }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

