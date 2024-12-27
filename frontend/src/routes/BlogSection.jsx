import { Button, Card, Col, Container, Row } from 'react-bootstrap';
import BlogCard from './BlogCard';
import { css } from '@emotion/react';
import PrimaryButton from './PrimaryButton';

function BlogSection({ totalPosts }) {
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
      <h1 className='text-center' style={{ marginBottom: '18px' }}>
        CHECK OUT OUR LATEST UPDATES!
      </h1>
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
      <center>
        <PrimaryButton>See All Posts</PrimaryButton>
      </center>
    </Container>
  );
}

export default BlogSection;
