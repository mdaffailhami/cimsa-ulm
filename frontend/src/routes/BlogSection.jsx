import { Button, Card, Col, Container, Pagination, Row } from 'react-bootstrap';
import BlogCard from './BlogCard';
import { css, Global } from '@emotion/react';
import PrimaryButton from './PrimaryButton';

function BlogSection({
  totalPosts,
  header = null,
  includeEndDivider = false,
  usePagination,
}) {
  return (
    <Container
      data-aos='fade-right'
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
        {(() => {
          const cards = [];

          for (let i = 1; i <= totalPosts; i++) {
            cards.push(
              <BlogCard
                key={i}
                thumbnail={`https://picsum.photos/200/${301 + i}`}
                title={
                  i +
                  ' Judul lurr aowkwkwkkw lol uwu wadidaw, naniii, zehhahhahaha'
                }
                description={
                  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris auctor, ipsum sit amet convallis varius, lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                }
              />
            );
          }

          return cards;
        })()}
      </Row>
      {(() => {
        if (!usePagination) {
          return (
            <center>
              <PrimaryButton to='/blog'>See All Posts</PrimaryButton>
            </center>
          );
        } else {
          return (
            <>
              <Global
                styles={css`
                  .pagination > li > a {
                    background-color: white;
                    color: red;
                  }

                  .pagination > li > a:focus,
                  .pagination > li > a:hover,
                  .pagination > li > span:focus,
                  .pagination > li > span:hover {
                    color: red;
                    outline: none;
                    box-shadow: none;
                  }

                  .pagination > .active > a,
                  .pagination > .active > .page-link {
                    color: white;
                    background-color: red !important;
                    border: solid 1px red !important;
                  }

                  .pagination > .active > a:hover {
                    background-color: red !important;
                    border: solid 1px red;
                  }
                `}
              />
              <Pagination
                css={css`
                  display: flex;
                  justify-content: center;
                `}
              >
                <Pagination.Prev />
                <Pagination.Item active>{1}</Pagination.Item>
                <Pagination.Item>{2}</Pagination.Item>
                <Pagination.Item>{3}</Pagination.Item>
                <Pagination.Ellipsis />
                <Pagination.Item>{28}</Pagination.Item>
                <Pagination.Next />
              </Pagination>
            </>
          );
        }
      })()}
      {includeEndDivider && <hr />}
    </Container>
  );
}

export default BlogSection;
