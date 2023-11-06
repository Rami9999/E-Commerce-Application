<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div id="review_form_wrapper">
                        @if(Session::has('review'))
                            <div class="alert alert-success">{{Session::get('review')}}</div>
                        @endif
                    @if($order_item->review_status ==0)
                        <div id="comments">
							<h2 class="woocommerce-Reviews-title">Add review for </h2>
							<ol class="commentlist">
								<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
									<div id="comment-20" class="comment_container"> 
										<img alt="" src="{{asset('assets/images/products')}}/{{$order_item->product->image}}.jpg" height="80" width="80">
										<div class="comment-text">
											<p class="meta"> 
												<strong class="woocommerce-review__author">{{$order_item->product->name}}</strong> 
											</p>
										</div>
									</div>
								</li>
							</ol>
						</div>
                        
                        <div id="review_form">

                            <div id="respond" class="comment-respond"> 

                                <form wire:submit.prevent="addReview" id="commentform" class="comment-form" >
                                    <div class="comment-form-rating">
                                        <span>Your rating</span>
                                        <p class="stars">
                                                                    
                                            <label for="rated-1"></label>
                                            <input type="radio" id="rated-1" name="rating" value="1" wire:model='rating'>
                                            <label for="rated-2"></label>
                                            <input type="radio" id="rated-2" name="rating" value="2" wire:model='rating'>
                                            <label for="rated-3"></label>
                                            <input type="radio" id="rated-3" name="rating" value="3" wire:model='rating'> 
                                            <label for="rated-4"></label>
                                            <input type="radio" id="rated-4" name="rating" value="4" wire:model='rating'>
                                            <label for="rated-5"></label>
                                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked" wire:model='rating'>
                                            @error('rating') <span class="text-danger">{{$message}}</span> @enderror
                                        </p>
                                    </div>
                                    <p class="comment-form-comment">
                                        <label for="comment">Your review <span class="required">*</span>
                                        </label>
                                        <textarea id="comment" name="comment" cols="45" rows="8" wire:model='comment'></textarea>
                                        @error('comment') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                    <p class="form-submit">
                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                    </p>
                            @else
                                <h3>Thanls for your rating</h3>
                                <a href="{{route('user.orders')}}" class="btn btn-success">My Orders</a>
                            @endif

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
