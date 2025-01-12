import { css } from '@emotion/react';
import { Card, Col, Container, Image, Row } from 'react-bootstrap';
import PrimaryButton from '../PrimaryButton';
import OnHoverAnimationCss from '../OnHoverAnimationCss';

export default function TrainerCard({ thumbnail, title, description }) {
  return (
    <Col
      style={{ marginBottom: '24px' }}
      data-aos='fade'
      data-aos-duration='1200'
      data-aos-once='true'
    >
      <Card
        as='a'
        href={`/blog/${title.toLowerCase().replace(/ /g, '-')}`}
        css={css`
          height: 500px;
          text-decoration: none;
          border-radius: 20px;
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
        </Card.Header>
        <Card.Body style={{ textAlign: 'center' }}>
          <Card.Title
            style={{
              fontSize: '23px',
              overflow: 'hidden',
              textOverflow: 'ellipsis',
              display: '-webkit-box',
              WebkitLineClamp: 2,
              WebkitBoxOrient: 'vertical',
              fontWeight: 'bold',
            }}
          >
            {title}
          </Card.Title>
          <Card.Text
            style={{
              overflow: 'hidden',
              textOverflow: 'ellipsis',
              display: '-webkit-box',
              WebkitLineClamp: 7,
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
