import { useEffect, useState } from 'react';
import FilterChip from './FilterChip';
import BlogSection from '../../components/BlogSection';
import { endpoint } from '../../configs';
import LoadingPage from '../../components/LoadingPage';
import PostsPagination from './PostsPagination';
import { fetchJSON, getWebPaths } from '../../utils';
import LoadFailedPage from '../../components/LoadFailedPage';
import useSWR from 'swr';

export default function PostsSection() {
  const paths = getWebPaths();

  const [configs, setConfigs] = useState({
    category: paths[1],
    page: parseInt(paths[2]),
  });

  const { category, page } = configs;

  const posts = useSWR(
    `${endpoint}/api/post?page=${page}&limit=9&category=${
      category == 'all' ? '' : category
    }`,
    fetchJSON
  );

  const setCategory = (newCategory) => {
    window.history.replaceState({}, '', `/blog/${newCategory}/1`);
    setConfigs({ category: newCategory, page: 1 });
  };

  const setPage = (newPage) => {
    if (!posts.data) throw new Error('Failed to navigate!');

    newPage = parseInt(newPage);
    if (newPage < 1) newPage = 1;
    if (newPage > posts.data.pagination.last_page)
      newPage = posts.data.pagination.last_page;

    window.history.replaceState({}, '', `/blog/${category}/${newPage}`);
    setConfigs({ ...configs, page: newPage });
  };

  useEffect(() => {
    (async () => {
      // refetch (revalidate/mutate)
      await posts.mutate();

      if (posts.data) {
        // If current page is greater than new last page
        if (posts.data.pagination.last_page < page) {
          setPage(posts.data.pagination.last_page);
        }
      }
    })();
  }, [configs]);

  if (posts.isLoading) {
    return <LoadingPage />;
  }

  if (posts.error) {
    return <LoadFailedPage />;
  }

  return (
    <>
      <div data-aos='zoom-in' data-aos-duration='1200' data-aos-once='true'>
        <hr />
      </div>
      <section
        className='d-flex justify-content-center align-items-center'
        style={{ display: 'flex', justifyContent: 'center', gap: '12px' }}
      >
        <FilterChip
          category='All'
          active={category == 'all'}
          onClick={() => {
            setCategory('all');
          }}
        />
        <FilterChip
          category='Articles'
          active={category == 'articles'}
          onClick={() => {
            setCategory('articles');
          }}
        />
        <FilterChip
          category='Activities'
          active={category == 'activities'}
          onClick={() => {
            setCategory('activities');
          }}
        />
      </section>
      <section>
        <BlogSection
          aos={null}
          header={<br />}
          posts={posts.data.data}
          footer={
            <PostsPagination
              activePage={page}
              totalPage={!posts.data ? 1 : posts.data.pagination.last_page}
              onPageChange={(x) => {
                window.history.replaceState({}, '', `/blog/${category}/${x}`);

                setPage(x);
              }}
            />
          }
        />
      </section>
      <div data-aos='zoom-in' data-aos-duration='1200' data-aos-once='true'>
        <hr />
      </div>
    </>
  );
}
