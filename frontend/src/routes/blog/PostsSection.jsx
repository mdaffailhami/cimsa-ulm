import { useState } from 'react';
import FilterChip from './FilterChip';
import BlogSection from '../BlogSection';

export default function PostsSection() {
  const [activeCategory, setActiveCategory] = useState(
    window.location.pathname.split('/')[2]
  );

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
          active={activeCategory == undefined || activeCategory == ''}
          onClick={() => {
            window.history.replaceState({}, '', '/blog');
            setActiveCategory(undefined);
          }}
        />
        <FilterChip
          category='Articles'
          active={activeCategory == 'articles'}
          onClick={() => {
            window.history.replaceState({}, '', '/blog/articles');
            setActiveCategory('articles');
          }}
        />
        <FilterChip
          category='Activities'
          active={activeCategory == 'activities'}
          onClick={() => {
            window.history.replaceState({}, '', '/blog/activities');
            setActiveCategory('activities');
          }}
        />
      </section>
      <section>
        <BlogSection header={<br />} totalPosts={9} usePagination={true} />
      </section>
      <div data-aos='zoom-in' data-aos-duration='1200' data-aos-once='true'>
        <hr />
      </div>
    </>
  );
}
