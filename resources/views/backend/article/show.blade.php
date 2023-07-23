@extends('backend.index')
@section('title', 'Article Detail | Skiddie ID')
@section('container')

    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Article Detail</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Article Detail
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="blog-wrap">
            <div class="container pd-0">
                <div class="row">
                    <div class="col-8">
                        <div class="blog-detail card-box overflow-hidden mb-30">
                            <div class="blog-img">
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="" />
                            </div>
                            <div class="blog-caption">
                                <h4 class="mb-10">
                                    {{ $article->title }}
                                </h4>
                                <p>
                                <div id="app">
<<<<<<< Updated upstream
                                    <template v-if="!showFullArticle">
                                        <p v-html="truncatedText"></p>
                                        <button class="btn btn-secondary" @click="showFullArticle = true"
                                            v-if="hasMoreContent">Read More</button>
                                    </template>
                                    <div v-else>{!! $article->body !!}</div>
                                </div>









=======
                                    <p v-if="!showFullArticle">{{ substr($article->body, 0, 200) }}...</p>
                                    <p v-else>{{ $article->body }}</p>
                                    <button class="btn btn-secondary" @click="showFullArticle = true"
                                        v-if="!showFullArticle">Read More</button>
                                </div>
>>>>>>> Stashed changes
                                </p>
                                <div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-box mb-30">
                            <h5 class="pd-20 h5 mb-0">Recent Post</h5>
                            <div class="latest-post">
                                <ul>
                                    @foreach ($recentArticles as $recent)
                                        <li>
                                            <h4>
                                                <a href="/dashboard/article/{{ $recent->slug }}">
<<<<<<< Updated upstream
                                                    {{ substr($recent->title, 0, 25) }}... </a>
=======
                                                    {{ substr($article->title, 0, 25) }}... </a>
>>>>>>> Stashed changes
                                            </h4>
                                            <span>{{ $recent->category }}</span>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                showFullArticle: false,
                maxLength: 200,
                article: `{!! addslashes($article->body) !!}`,
                truncatedText: '',
                hasMoreContent: false
            },
            methods: {
                calculateContent() {
                    if (this.article.length > this.maxLength) {
                        this.hasMoreContent = true;
                        this.truncatedText = this.article.slice(0, this.maxLength) + '...';
                    } else {
                        this.hasMoreContent = false;
                        this.truncatedText = this.article;
                    }
                }
            },
            created() {
                this.calculateContent();
            }
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                showFullArticle: false
            }
        });
    </script>



@endsection
