import { css } from '@emotion/react';
import { Col, Image, Row } from 'react-bootstrap';
import HtmlParser from '../../HtmlParser';

export default function TestimonialsSection({ testimonies, color }) {
  return (
    <section
      css={css`
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 2%;
        background: white;
        box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.4);
        border-radius: 20px;
      `}
    >
      <h2
        style={{
          textAlign: 'center',
          color: 'white',
          textShadow: `-1.5px -1.5px 0 ${color}, 1.5px -1.5px 0 ${color}, -1.5px 1.5px 0 ${color}, 1.5px 1.5px 0 ${color}`,
        }}
      >
        <b>TESTIMONIALS</b>
      </h2>
      <hr style={{ borderWidth: '2.8px', opacity: 1 }} />
      {testimonies.map((testimony, i) => (
        <TestimonyCard
          key={i}
          testimony={testimony}
          reverse={i % 2 === 1}
          myCss={i % 2 === 1 ? '' : 'margin-bottom: 22px;'}
        />
      ))}
    </section>
  );
}

function TestimonyCard({ testimony, reverse = false, myCss = '' }) {
  return (
    <Row
      css={css`
        display: flex;
        flex-direction: ${reverse ? 'row-reverse' : 'row'};
        text-align: ${reverse ? 'right' : 'left'};

        ${myCss}
      `}
    >
      <Col
        xs={12}
        sm={5}
        lg={3}
        css={css`
          margin-bottom: 8px;
          @media (min-width: 592px) {
            margin-bottom: 0;
          }
        `}
      >
        <Image
          src={testimony.image}
          alt='Testimony Picture'
          css={css`
            object-fit: cover;
            width: 100%;
            height: 400px;

            @media (min-width: 992px) {
              height: 232px;
            }
          `}
        />
      </Col>
      <Col xs={12} sm={7} lg={9}>
        <h3 style={{ marginBottom: 0 }}>
          <b>{testimony.name || '-'}</b>
        </h3>
        <h6 style={{ color: 'gray' }}>{testimony.position || '-'}</h6>
        <p style={{ color: 'black', textAlign: 'justify' }}>
          <HtmlParser html={testimony.description || '-'} />
        </p>
      </Col>
    </Row>
  );
}
