import { css, Global } from '@emotion/react';
import { Card, Col, Image } from 'react-bootstrap';
import OnHoverAnimationCss from './OnHoverAnimationCss';
import { Link } from 'react-router';

export default function BlogCard({
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

            ${OnHoverAnimationCss(1.05)}
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
