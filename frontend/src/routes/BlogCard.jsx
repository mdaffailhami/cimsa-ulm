import { css } from '@emotion/react';
import { Button, Card, Col } from 'react-bootstrap';

export default function BlogCard({ thumbnail, title, description }) {
  return (
    <Col xs={12} sm={12} md={6} lg={4} style={{ marginBottom: '24px' }}>
      <Card
        as='a'
        href={`/blog/${title.toLowerCase().replace(/ /g, '-')}`}
        style={{
          height: '419px',
          textDecoration: 'none',
        }}
        css={css`
          &:hover {
            transition: all 0.3s ease-in-out;
            transform: scale(1.05);
          }
          &:not(:hover) {
            transition: transform 0.3s ease-in-out;
            transform: scale(1);
          }
        `}
      >
        <Card.Header
          style={{
            padding: '0',
            backgroundImage: `url(${thumbnail})`,
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            height: '250px',
          }}
        />
        <Card.Body>
          <Card.Title
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
  );
}
