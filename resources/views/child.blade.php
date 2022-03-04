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
                    <div class="card-header">
                        <h1>Liturgical Calender</h1>
                    </div>
                    <div class="card-body">
                        <ol>
                            <li><strong class="text-info">Christmas: &nbsp;&nbsp;</strong>{{ $xmasDate }}</li>
                            <li><strong>Vestement color:</strong>{{ $feast["Christmas.color"] }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

