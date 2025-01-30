import { css, Global } from '@emotion/react';
import { Accordion } from 'react-bootstrap';
import HtmlParser from '../../HtmlParser';

export default function UpcomingActivitiesSection({ name, color, activities }) {
  return (
    <section
      css={css`
        max-width: 962px;
        margin: 0 auto;
      `}
    >
      <Global
        styles={css`
          .accordion-button {
            background-color: ${color};
            color: white;
            font-weight: bold;
            border: 1px solid white;
            /* text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black,
            -0.5px 0.5px 0 black, 0.5px 0.5px 0 black; */
          }

          .accordion-button:not(.collapsed) {
            background-color: ${color};
            color: white;
          }

          .accordion-button::after {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M2 5L8 11L14 5'/%3E%3C/svg%3E");
          }

          .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M2 5L8 11L14 5'/%3E%3C/svg%3E");
          }

          .accordion-button:focus {
            box-shadow: none;
            border-color: white;
          }
        `}
      />
      <h2 className='text-center display-6' style={{ marginBottom: '18px' }}>
        UPCOMING {name} ACTIVITY
      </h2>
      <hr style={{ borderWidth: '3px', opacity: 1, color: color }} />
      <Accordion alwaysOpen>
        {activities.map((activity, i) => (
          <Accordion.Item key={i} eventKey={i}>
            <Accordion.Header>{activity.name}</Accordion.Header>
            <Accordion.Body as='p'>
              <HtmlParser html={activity.description} />
            </Accordion.Body>
          </Accordion.Item>
        ))}
        <Accordion.Item eventKey='0'>
          <Accordion.Header>Accordion Item #1</Accordion.Header>
          <Accordion.Body></Accordion.Body>
        </Accordion.Item>
      </Accordion>
    </section>
  );
}
