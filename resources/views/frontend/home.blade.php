@extends('frontend.template')
@section('content')
@include('frontend.components.component-home')
<style>
   
</style>
<div class="card-header mt-2">
    <div class="d-flex justify-content-between my-2">
        <h3> Peta Sebaran Virus</h3>
        <div class="col-2">
            <select name="select" id="selectOption" class="form-control " onchange="javascript:handleSelect(this)">
                <option value="/">Area</option>
                <option value="/individual-cases">Titik</option>
            </select>
        </div>
    </div>
</div>
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-warning loader" id="spinner" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <p>Filter</p>
                <select name="id_virus" id="id_virus" class="form-select  @error('id_virus') is-invalid @enderror mb-3"
                    required>
                    <option value="">Pilih Jenis Virus</option>
                    @foreach ($virus as $item)
                        <option value="{{ $item->id }} ">
                            {{ $item->nama_virus }}</option>
                    @endforeach
                </select>
                <!-- <p>Pilih Jenis Penyebaran</p> -->
                <!-- <div class="mb-3 ">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="check[]" value="area" id="defaultCheck1"
                            checked />
                        <label class="form-check-label" for="defaultCheck3">Area</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="check[]" value="titik" id="defaultCheck2"  onclick="window.location='/individual-cases';"/>
                        <label class="form-check-label" for="defaultCheck3"> Titik</label>
                    </div>
                </div> -->
                <p>
                    
                    <label for="amount">Date range: <span>
                            <input type="text" id="date" style="border: 0; color: blue; font-weight: bold;" size="100" />
                        </span>
                    </label>
                </p>
                <div id="slider-range" class="mb-3"></div>
                <!-- <p>Pilih Gender :</p>
                <select name="gender" id="gender" class="form-select mb-3">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select> -->
                <button id="filter" type="submit" class="btn btn-primary filter " style="width: 14.5em;">Filter</button>
            </div>
            <div class="col" id="map">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row g-5 mt-2">
            <div class="col-md-8">
                <article class="blog-post">
                    <h2 class="blog-post-title">Apa itu Bank Data ?</h2><br>
                    {{-- <p class="blog-post-meta">January 1, 2021 by <a href="#">Mark</a></p> --}}
                    <p>Database ini merupakan kumpulan data sekuen dari hasil pemeriksaan virus penyebab penyakit infeksi
                        tropis
                        yang diisolasi dari pasien di Indonesia. Database ini bisa digunakan untuk memberikan gambaran tipe
                        dan
                        subtype dari virus beserta varian yang muncul. Persebaran dari tipe virus di Indonesia akan bisa
                        terlihat berdasarkan waktu dan tempat. Selain itu juga database ini dilengkapi dengan informasi dari
                        judul penelitian yang dilakukan terkait dengan data sekuen yang ditampilkan beserta author dari
                        penelitian tersebut. </p>
                    <hr>
                    <p>Database ini diharapkan dapat menjadi rujukan dari akademisi atau peneliti untuk melakukan komparasi
                        data-data sekuen yang diperoleh dari isolat virus di Indonesia. Sehingga persebaran virus dan
                        tipenya di
                        berbagai daerah di Indonesia dapat menjadi informasi yang komprehensif dan informatif. Data dari
                        database ini bisa digunakan untuk mengambil suatu kebijakan atau langkah pencegahan dari persebaran
                        penyakit infeksi yang disebabkan oleh berbagai patogen, misalkan virus, bakteri, jamur, dan
                        lain-lain
                        dengan melihat persebaran dari tipe atau mutasi yang muncul.

                    </p>
                    <p>
                        Data tipe atau mutasi dari patogen ini akan berkontribusi terhadap karakteristik dari patogen
                        tersebut.
                        Misalkan sifat daya tular, keparahan penyakit, kemampuan untuk menghindari respon vaksin dan
                        sebagainya.
                        Data tipe virus ini dapat menjadi dasar untuk penentuan pengobatan atau terapi yang dilakukan
                        sehingga
                        menjadi lebih presisi dan efektif.
                    </p>
                    <h2>Blockquotes</h2>
                    <p>This is an example blockquote in action:</p>
                    <blockquote class="blockquote">
                        <p>Quoted text goes here.</p>
                    </blockquote>
                    <p>This is some additional paragraph placeholder content. It has been written to fill the available
                        space and show how a longer snippet of text affects the surrounding content. We'll repeat it
                        often to keep the demonstration flowing, so be on the lookout for this exact same string of
                        text.</p>
                    <h3>Example lists</h3>
                    <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the
                        other highly repetitive body text used throughout. This is an example unordered list:</p>
                    <ul>
                        <li>First list item</li>
                        <li>Second list item with a longer description</li>
                        <li>Third list item to close it out</li>
                    </ul>
                    <p>And this is an ordered list:</p>
                    <ol>
                        <li>First list item</li>
                        <li>Second list item with a longer description</li>
                        <li>Third list item to close it out</li>
                    </ol>
                    <p>And this is a definiton list:</p>
                    <dl>
                        <dt>HyperText Markup Language (HTML)</dt>
                        <dd>The language used to describe and define the content of a Web page</dd>
                        <dt>Cascading Style Sheets (CSS)</dt>
                        <dd>Used to describe the appearance of Web content</dd>
                        <dt>JavaScript (JS)</dt>
                        <dd>The programming language used to build advanced Web sites and applications</dd>
                    </dl>
                    <h2>Inline HTML elements</h2>
                    <p>HTML defines a long list of available inline tags, a complete list of which can be found on the
                        <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element">Mozilla Developer
                            Network</a>.
                    </p>
                    <ul>
                        <li><strong>To bold text</strong>, use <code
                                class="language-plaintext highlighter-rouge">&lt;strong&gt;</code>.</li>
                        <li><em>To italicize text</em>, use <code
                                class="language-plaintext highlighter-rouge">&lt;em&gt;</code>.</li>
                        <li>Abbreviations, like <abbr title="HyperText Markup Langage">HTML</abbr> should use <code
                                class="language-plaintext highlighter-rouge">&lt;abbr&gt;</code>, with an optional <code
                                class="language-plaintext highlighter-rouge">title</code> attribute for the full phrase.
                        </li>
                        <li>Citations, like <cite>— Mark Otto</cite>, should use <code
                                class="language-plaintext highlighter-rouge">&lt;cite&gt;</code>.</li>
                        <li><del>Deleted</del> text should use <code
                                class="language-plaintext highlighter-rouge">&lt;del&gt;</code> and <ins>inserted</ins>
                            text should use <code class="language-plaintext highlighter-rouge">&lt;ins&gt;</code>.</li>
                        <li>Superscript <sup>text</sup> uses <code
                                class="language-plaintext highlighter-rouge">&lt;sup&gt;</code> and subscript
                            <sub>text</sub> uses <code class="language-plaintext highlighter-rouge">&lt;sub&gt;</code>.
                        </li>
                    </ul>
                    <p>Most of these elements are styled by browsers with few modifications on our part.</p>
                    <h2>Heading</h2>
                    <p>This is some additional paragraph placeholder content. It has been written to fill the available
                        space and show how a longer snippet of text affects the surrounding content. We'll repeat it
                        often to keep the demonstration flowing, so be on the lookout for this exact same string of
                        text.</p>
                    <h3>Sub-heading</h3>
                    <p>This is some additional paragraph placeholder content. It has been written to fill the available
                        space and show how a longer snippet of text affects the surrounding content. We'll repeat it
                        often to keep the demonstration flowing, so be on the lookout for this exact same string of
                        text.</p>
                    <pre><code>Example code block</code></pre>
                    <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the
                        other highly repetitive body text used throughout.</p>
                </article>

                <article class="blog-post">
                    <h2 class="blog-post-title">Another blog post</h2>
                    <p class="blog-post-meta">December 23, 2020 by <a href="#">Jacob</a></p>

                    <p>This is some additional paragraph placeholder content. It has been written to fill the available
                        space and show how a longer snippet of text affects the surrounding content. We'll repeat it
                        often to keep the demonstration flowing, so be on the lookout for this exact same string of
                        text.</p>
                    <blockquote>
                        <p>Longer quote goes here, maybe with some <strong>emphasized text</strong> in the middle of it.
                        </p>
                    </blockquote>
                    <p>This is some additional paragraph placeholder content. It has been written to fill the available
                        space and show how a longer snippet of text affects the surrounding content. We'll repeat it
                        often to keep the demonstration flowing, so be on the lookout for this exact same string of
                        text.</p>
                    <h3>Example table</h3>
                    <p>And don't forget about tables in these posts:</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Upvotes</th>
                                <th>Downvotes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Alice</td>
                                <td>10</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <td>Bob</td>
                                <td>4</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Charlie</td>
                                <td>7</td>
                                <td>9</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Totals</td>
                                <td>21</td>
                                <td>23</td>
                            </tr>
                        </tfoot>
                    </table>

                    <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the
                        other highly repetitive body text used throughout.</p>
                </article>

                <article class="blog-post">
                    <h2 class="blog-post-title">New feature</h2>
                    <p class="blog-post-meta">December 14, 2020 by <a href="#">Chris</a></p>

                    <p>This is some additional paragraph placeholder content. It has been written to fill the available
                        space and show how a longer snippet of text affects the surrounding content. We'll repeat it
                        often to keep the demonstration flowing, so be on the lookout for this exact same string of
                        text.</p>
                    <ul>
                        <li>First list item</li>
                        <li>Second list item with a longer description</li>
                        <li>Third list item to close it out</li>
                    </ul>
                    <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the
                        other highly repetitive body text used throughout.</p>
                </article>

                <nav class="blog-pagination" aria-label="Pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1"
                        aria-disabled="true">Newer</a>
                </nav>

            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h4 class="fst-italic">About</h4>
                        <p class="mb-0">Database ini merupakan kumpulan data sekuen dari hasil pemeriksaan virus penyebab
                            penyakit infeksi tropis yang diisolasi dari pasien di Indonesia.</p>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Archives</h4>
                        <ol class="list-unstyled mb-0">
                            <li><a href="#">March 2021</a></li>
                            <li><a href="#">February 2021</a></li>
                            <li><a href="#">January 2021</a></li>
                            <li><a href="#">December 2020</a></li>
                            <li><a href="#">November 2020</a></li>
                            <li><a href="#">October 2020</a></li>
                            <li><a href="#">September 2020</a></li>
                            <li><a href="#">August 2020</a></li>
                            <li><a href="#">July 2020</a></li>
                            <li><a href="#">June 2020</a></li>
                            <li><a href="#">May 2020</a></li>
                            <li><a href="#">April 2020</a></li>
                        </ol>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Elsewhere</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
