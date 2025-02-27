import { css } from '@emotion/react';
import { Card, Col, Image } from 'react-bootstrap';
import { getOnHoverAnimationCss } from '../../utils';

export default function TrainerCard({ thumbnail, title, description, url }) {
  return (
    <Col
      style={{ marginBottom: '24px' }}
      data-aos='fade'
      data-aos-duration='1200'
      data-aos-once='true'
    >
      <Card
        as='a'
        href={url}
        css={css`
          height: 433px;
          text-decoration: none;
          border-radius: 20px;
          overflow: hidden;
          box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.2);

          &:hover h3.card-title {
            text-decoration: underline;
          }

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
        </Card.Header>
        <Card.Body style={{ textAlign: 'center' }}>
          <Card.Title
            as='h3'
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
              WebkitLineClamp: 5,
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
