import { useEffect, useState } from 'react';
import FilterChip from './FilterChip';
import BlogSection from '../BlogSection';
import { endpoint } from '../../configs';
import LoadingIndicator from '../LoadingIndicator';
import PostsPagination from './PostsPagination';
import { getWebPaths } from '../../utils';

export default function PostsSection() {
  const paths = getWebPaths();

  const [blog, setBlog] = useState([]);
  const { pagination, posts: data } = blog;

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
    if (!pagination) throw new Error('Failed to navigate!');
    newPage = parseInt(newPage);
    if (newPage < 1) newPage = 1;
    if (newPage > pagination.last_page) newPage = pagination.last_page;

    window.history.replaceState({}, '', `/blog/${category}/${newPage}`);
    setConfigs({ ...configs, page: newPage });
  };

  // useEffect(() => {
  //   (async () => {
  //     // await new Promise((resolve) => setTimeout(resolve, 3000));
  //     try {
  //       const res = await fetch(
  //         `${endpoint}/api/post?page=1&limit=3&category=articles`
  //       );

  //       setPageData(await res.json());
  //     } catch (err) {
  //       alert(err);
  //     }
  //   })();
  // }, []);

  // if (!pageData) {
  //   return <LoadingIndicator />;
  // }

  return (
    <>
      <div data-aos='zoom-in' data-aos-duration='1200' data-aos-once='true'>
        <hr />
      </div>
      <section
        data-aos='zoom-in-up'
        data-aos-duration='1200'
        data-aos-once='true'
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
          header={<br />}
          totalPosts={9}
          footer={
            <PostsPagination
              activePage={page}
              totalPage={!pagination ? 1 : pagination.last_page}
              onPageChange={(x) => {
                if (category == undefined) {
                  window.history.replaceState(
                    {},
                    '',
                    `/blog${x == 1 ? '' : `/${x}`}`
                  );
                } else {
                  window.history.replaceState(
                    {},
                    '',
                    `/blog/${paths[2]}${x == 1 ? '' : `/${x}`}`
                  );
                }

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
