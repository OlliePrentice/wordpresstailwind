import resizeEvent from '../utilities/triggerResizeEvent';
import InfiniteScroll from 'infinite-scroll';
import imagesLoaded from 'imagesloaded';
import getPathFromUrl from '../utilities/getPathFromUrl';
import urlExists from '../utilities/urlExists';

function Posts() {

    function infinitePosts() {

        const elem = document.querySelector('.inf-grid');

        if ($(elem).length && $('.next-posts-link a').length) {

            const infScroll = new InfiniteScroll(elem, {
                // options
                path: '.next-posts-link a',
                append: '.inf-post',
                history: false,
                scrollThreshold: true,
                status: ".page-load-status"
            });

            infScroll.imagesLoaded = imagesLoaded;

            infScroll.on("append", (
                _event,
                _response,
                _path,
                items
            ) => {
                $(items).addClass("appended-item");
                window.dispatchEvent(resizeEvent);
                infScroll.imagesLoaded( () => {
                    $(items)
                        .find("img")
                        .each( (_index, img) => {
                            img.outerHTML = img.outerHTML;
                        });
                });

            });

            return infScroll;
        }

      

    }

    let infScroll = infinitePosts();


    $( '.filter-btn' ).on( 'click', (e) => {
        e.preventDefault();

        if(e.currentTarget.classList.contains('active')) {
            e.currentTarget.classList.remove('active');
        } else {
            e.currentTarget.classList.add('active');
        }

        infScroll.destroy();

        const taxQuery = [];

        const activeFilterButtons = document.querySelectorAll('.filter-btn.active');

        activeFilterButtons.forEach((item, _index) => {
            const btnTaxonomy   = item.getAttribute('data-taxonomy');
            const btnTermID     = item.getAttribute('data-term-id');

            const found = taxQuery.map(e => e.name ).indexOf(btnTaxonomy);

            if(found === -1) {
                taxQuery.push({name: btnTaxonomy, terms: [btnTermID]});
            } else {
                taxQuery[found].terms.push(btnTermID);
            }
   
        });

        let urlString = '?';

        taxQuery.forEach((item, i) => {

            if(i > 0) urlString += '&';

            item.terms.forEach((term, j) => {

                if(j > 0) urlString += '&';

                urlString += '_' + item.name + '[]=' + term;
            });

        });


        const postTypes = JSON.parse(document.querySelector('.post-loop').getAttribute('data-post-types'));
        const postsPerPage = document.querySelector('.post-loop').getAttribute('data-posts-per-page');

        const data = {
            action: "filter_posts",
            _taxQuery: taxQuery,
            _postTypes: postTypes,
            _perPage: parseInt(postsPerPage)
        };

        const nextLink = getPathFromUrl($('.next-posts-link a').attr('href'));

        $('.next-posts-link a').attr('href', nextLink + encodeURI(urlString));


        $.ajax({
            url: theme_params.ajaxurl,
            data: data,
            method: 'GET'
        }).done(( response ) => {

            const responseObj = JSON.parse(response);

            $('.post-grid').remove();

            $(responseObj.content).insertBefore('.post-loop .pagination');
        
            urlExists(nextLink + encodeURI(urlString), (exists) => {
                if(exists) {
                    infinitePosts();
                }
            });
            

        }).fail((err) => {
            console.log(err);
        });

    });

}

export default Posts;
