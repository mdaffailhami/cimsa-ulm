import { Card, Col, Container, Image, Row } from 'react-bootstrap';
import { css, Global } from '@emotion/react';
import PrimaryButton from './PrimaryButton';
import { Link } from 'react-router';
import { getOnHoverAnimationCss } from '../utils';

export default function BlogSection({
  posts,
  header = null,
  includeEndDivider = false,
  footer = null,
  aos = 'fade-right',
}) {
  return (
    <Container
      as={'section'}
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
            <h2
              css={css`
                margin-top: 0;
                margin-bottom: 18px;
                text-align: center;
                font-size: calc(1.375rem + 1.5vw);
                font-weight: 500;
                line-height: 1.2;
                color: var(--bs-heading-color);
              `}
            >
              CHECK OUT OUR LATEST UPDATES!
            </h2>
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
            date={post.created_at}
            url={`/blog/detail/${post.slug}`}
          />
        ))}
      </Row>
      {(() => {
        if (!footer) {
          return (
            <div className='d-flex justify-content-center'>
              <PrimaryButton
                style={{ display: 'block', margin: '0 auto' }}
                to='/blog/all/1'
              >
                See All Posts
              </PrimaryButton>
            </div>
          );
        } else {
          return footer;
        }
      })()}
      {includeEndDivider && <hr />}
    </Container>
  );
}

function BlogCard({
  thumbnail,
  title,
  description,
  date,
  url,
  reloadDocument,
}) {
  return (
    <>
      <Global
        styles={css`
          .blog-card:hover .blog-card-title {
            text-decoration: underline;
          }
        `}
      />
      <Col
        className='blog-card'
        xs={12}
        sm={12}
        md={6}
        lg={6}
        xl={4}
        style={{ marginBottom: '24px' }}
        data-aos='fade'
        data-aos-duration='1200'
        data-aos-once='true'
      >
        <Card
          as={Link}
          to={url}
          reloadDocument={reloadDocument}
          css={css`
            height: 419px;
            text-decoration: none;
            overflow: hidden;

            ${getOnHoverAnimationCss(1.05)}
          `}
        >
          <Card.Header
            style={{
              position: 'relative',
              padding: '0',
              height: '250px',
            }}
          >
            <Image
              src={thumbnail}
              alt={title}
              style={{ objectFit: 'cover', width: '100%', height: '100%' }}
            />
            <div
              css={css`
                position: absolute;
                bottom: 5px;
                right: 5px;
                padding: 4px;
                background-color: rgba(0, 0, 0, 0.57);
                border-radius: 8px;
                color: white;
                font-size: 13px;
              `}
            >
              {new Intl.DateTimeFormat('en-US', {
                month: 'long',
                day: 'numeric',
                year: 'numeric',
              }).format(new Date(date))}
            </div>
          </Card.Header>
          <Card.Body>
            <Card.Title
              className='blog-card-title'
              style={{
                fontSize: '23px',
                overflow: 'hidden',
                textOverflow: 'ellipsis',
                display: '-webkit-box',
                WebkitLineClamp: 2,
                WebkitBoxOrient: 'vertical',
              }}
            >
              {title}
            </Card.Title>
            <Card.Text
              style={{
                overflow: 'hidden',
                textOverflow: 'ellipsis',
                display: '-webkit-box',
                WebkitLineClamp: 3,
                WebkitBoxOrient: 'vertical',
              }}
            >
              {description}
            </Card.Text>
          </Card.Body>
        </Card>
      </Col>
    </>
  );
}
