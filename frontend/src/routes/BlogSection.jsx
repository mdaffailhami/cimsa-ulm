import { Container, Row } from 'react-bootstrap';
import BlogCard from './BlogCard';
import { css } from '@emotion/react';
import PrimaryButton from './PrimaryButton';

function BlogSection({
  posts,
  header = null,
  includeEndDivider = false,
  footer = null,
  aos = 'fade-right',
}) {
  return (
    <Container
      data-aos={aos}
      data-aos-once='true'
      data-aos-duration='1200'
      css={css`
        padding-left: 24px;
        padding-right: 24px;

        @media (min-width: 992px) {
          padding-left: 100px;
          padding-right: 100px;
        }
      `}
    >
      {(() => {
        if (header) {
          return header;
        } else {
          return (
            <h1 className='text-center' style={{ marginBottom: '18px' }}>
              CHECK OUT OUR LATEST UPDATES!
            </h1>
          );
        }
      })()}
      <Row className='d-flex justify-content-center'>
        {posts.map((post, i) => (
          <BlogCard
            key={i}
            thumbnail={post.cover}
            title={post.title}
            description={post.highlight}
            date={post.updated_at}
            url={`/blog/detail/${post.slug}`}
          />
        ))}
      </Row>
      {(() => {
        if (!footer) {
          return (
            <center>
              <PrimaryButton to='/blog/all/1'>See All Posts</PrimaryButton>
            </center>
          );
        } else {
          return footer;
        }
      })()}
      {includeEndDivider && <hr />}
    </Container>
  );
}

export default BlogSection;
