import { useEffect, useState } from 'react';
import FilterChip from './FilterChip';
import BlogSection from '../BlogSection';
import { endpoint } from '../../configs';
import LoadingIndicator from '../LoadingIndicator';
import PostsPagination from './PostsPagination';
import { getWebPaths } from '../../utils';

export default function PostsSection() {
  const paths = getWebPaths();

  const [blog, setBlog] = useState(undefined);

  const [configs, setConfigs] = useState({
    category: paths[1],
    page: parseInt(paths[2]),
  });

  const { category, page } = configs;

  const setCategory = (newCategory) => {
    window.history.replaceState({}, '', `/blog/${newCategory}/${page}`);
    setConfigs({ ...configs, category: newCategory });
  };

  const setPage = (newPage) => {
    if (!blog) throw new Error('Failed to navigate!');

    newPage = parseInt(newPage);
    if (newPage < 1) newPage = 1;
    if (newPage > blog.pagination.last_page)
      newPage = blog.pagination.last_page;

    window.history.replaceState({}, '', `/blog/${category}/${newPage}`);
    setConfigs({ ...configs, page: newPage });
  };

  useEffect(() => {
    // loading
    setBlog(undefined);

    (async () => {
      // await new Promise((resolve) => setTimeout(resolve, 1000));
      try {
        const res = await fetch(
          `${endpoint}/api/post?page=${page}&limit=9&category=${
            category == 'all' ? '' : category
          }`
        );

        const data = await res.json();
        if (!data) throw new Error('Error fetching data');

        // If current page is greater than new last page
        if (data.pagination.last_page < page) {
          setPage(data.pagination.last_page);
        }

        setBlog(data);
      } catch (err) {
        alert(err);
      }
    })();
  }, [configs]);

  if (!blog) {
    return <LoadingIndicator />;
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
          posts={blog.data}
          footer={
            <PostsPagination
              activePage={page}
              totalPage={!blog ? 1 : blog.pagination.last_page}
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
