import { css } from '@emotion/react';
import { Button, Card, Col } from 'react-bootstrap';
import OnHoverAnimationCss from './OnHoverAnimationCss';

export default function BlogCard({ thumbnail, title, description }) {
  return (
    <Col
      xs={12}
      sm={12}
      md={6}
      lg={4}
      style={{ marginBottom: '24px' }}
      data-aos='fade'
      data-aos-duration='1200'
      data-aos-once='true'
    >
      <Card
        as='a'
        href={`/blog/${title.toLowerCase().replace(/ /g, '-')}`}
        css={css`
          height: 419px;
          text-decoration: none;

          ${OnHoverAnimationCss(1.05)}
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
